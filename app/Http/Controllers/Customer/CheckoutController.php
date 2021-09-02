<?php

namespace App\Http\Controllers\Customer;

use App\Model\StokModel;
use App\Model\OrderModel;
use App\Model\VendorModel;
use App\Model\ProductModel;
use Illuminate\Http\Request;
use App\Model\OrderDetailsModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckoutController extends Controller
{

    public function getVendorDalamKota($prov,$kota,Request $request) {
     //   SELECT * FROM tb_vendor WHERE user_id IN (SELECT user_id FROM tb_stok WHERE product_stok > 90 AND tb_vendor.kota_id = 345)
        $query = "SELECT * FROM tb_vendor WHERE user_id IN (";
        $sub_query = "SELECT user_id FROM tb_stok WHERE ";
        foreach ($request->qty as $key => $qty) {
            if($key === 0) {
                $sub_query .= "product_stok > ".$qty;
            } else {
                $sub_query .= " AND product_stok > ".$qty;
            }
        }
        $sub_query .= " AND tb_vendor.kota_id = ".$kota.")";
        $vendor = null;
        $vendor = DB::select($query.$sub_query);
        if(count($vendor) < 1) {
            // $vendor = DB::select("SELECT * FROM tb_vendor WHERE prov_id = $prov");
            $vendor = DB::table('tb_vendor')
                        ->join('tb_stok', 'tb_vendor.user_id', 'tb_stok.user_id')
                        ->join('tb_product', 'tb_stok.product_id', 'tb_product.product_id')
                        ->where('prov_id', '=', $prov)
                        ->where('tb_stok.product_id', '=', $request->product_id)
                        ->where('tb_stok.product_stok', '>=', $request->qty)
                        ->get();
            if(count($vendor) < 1) {
                // $vendor = DB::select("SELECT * FROM tb_vendor");
                $vendor = DB::table('tb_vendor')
                        ->join('tb_stok', 'tb_vendor.user_id', 'tb_stok.user_id')
                        ->join('tb_product', 'tb_stok.product_id', 'tb_product.product_id')
                        ->where('tb_stok.product_id', '=', $request->product_id)
                        ->where('tb_stok.product_stok', '>=', $request->qty)
                        ->get();
            }
        }
        return $vendor;
    }

    public function checkoutTahap1(Request $request) {
        $data = null;
        // cek apakah prov baru dan kota baru tidak kosong
        if($request->prov_baru !== null && $request->kota_baru !== null)  {
            $data = $this->getVendorDalamKota($request->prov_baru, $request->kota_baru, $request);
        } else {
            $data = $this->getVendorDalamKota($request->prov_lama, $request->kota_lama, $request);
        }
        return response()->json($data);
    }

    public function konversiBerat($berat, $satuan, $jumlah) {
        if($satuan === "g" || $satuan === "ml") {
            return (int)$berat * $jumlah;
        } else if($satuan === "mg") {
            return ($berat / 1000) * $jumlah;
        } else if($satuan === "l") {
            return ($berat * 1000) * $jumlah;
        }
    }

    public function getTotalBerat($product, $user) {
        $total = 0;
        foreach ($product as $p) {
            $pd = DB::table("tb_product")->where("product_id", $p)->first();
            $jumlah = DB::table("tb_tmp_details")->where("product_id", $p)->where("user_id", $user)->first("quantity");
            $berat = $this->konversiBerat($pd->product_weight, $pd->product_unit, $jumlah->quantity);
            $total += $berat; 
        }
        return $total;
    }

    public function getOngkir($origin, $desti, $weight, $courier = "jne") {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $origin, // ID kota/kabupaten asal
            'destination'   => $desti, // ID kota/kabupaten tujuan
            'weight'        => ceil($weight), // berat barang dalam gram
            'courier'       => $courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        return $cost;
    }

    public function checkOngkir(Request $request) {
        $berat = $this->getTotalBerat($request->product, $request->user);
        $weight = str_replace(',0', '', number_format(ceil($berat), 1, ',', ''));
        $vendor = VendorModel::where("user_id", (int)$request->vendor)->first();
        $ongkir = $this->getOngkir($vendor->kota_id, $request->destination, $berat);
        return response()->json($ongkir);
    }

    public function SetPoint(int $point) {
        if($point > 100000) {
            $point = (int)$point / 100000;
            $user = DB::table("tb_costumer")->where("costumer_id", Session::get("costumer_id"))->first();
            DB::table("tb_costumer")->where("costumer_id", Session::get("costumer_id"))->update([
                "point" => $user->point + $point
            ]);
        }
    }

    public function checkout(Request $request) {
        $order = OrderModel::create([
            "user_id" => $request->vendor,
            "costumer_id" => Session::get("costumer_id"),
            "invoice" => date("dmYHis").Session::get("costumer_id"),
            "proof" => $request->file("bukti_transfer")->store("bukti_transfer"),
            "order_address" => $request->alamat_lengkap,
            "kota_id" => $request->kota,
            "order_status" => "waiting",
            "noresi" => "0",
            "komisi" => "0",
            "combined_price" => (int)$request->jenis_kirim + (int)$request->total,
            "bank_id" => $request->bank_id
        ]);
        $total = DB::transaction(function() use($request,$order) {
            $total = 0;
            foreach ($request->qty as $key => $qty) {
                // kurangi stok vendor
                $product = StokModel::where("user_id", $request->vendor)->where("product_id",$request->product_id[$key])->first();
                $tmp = DB::table("tb_tmp_details")->where("user_id", Session::get("costumer_id"))->where("product_id",$request->product_id[$key])->first();
                // dd($tmp->capital_price);
                if($tmp != null) {
                    OrderDetailsModel::create([
                        "order_id" => $order->order_id,
                        "product_id" => $request->product_id[$key],
                        "dicount" => 0,
                        "quantity" => $qty,
                        "capital_price" => $tmp->capital_price,
                        "selling_price" => $tmp->selling_price,
                        "total_price" => (int)$tmp->total_price
                    ]);
                    $total += $tmp->total_price;
                    DB::table("tb_tmp_details")->where("user_id", Session::get("costumer_id"))->where("product_id",$request->product_id[$key])->delete();
                }
            }
            return $total;
        });
        $this->SetPoint($total);
        return redirect()->route('home');
    }
}

