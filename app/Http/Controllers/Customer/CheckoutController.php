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
            $vendor = DB::select("SELECT * FROM tb_vendor WHERE prov_id = $prov");
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

    public function checkOngkir(Request $request) {
        $vendor = VendorModel::where("user_id", (int)$request->vendor)->first();
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $vendor->kota_id, // ID kota/kabupaten asal
            'destination'   => $request->destination, // ID kota/kabupaten tujuan
            'weight'        => 100, // berat barang dalam gram
            'courier'       => "jne" // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        return response()->json($cost);
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
            "combined_price" => (int)$request->jenis_kirim + (int)$request->total,
            "bank_name" => $request->bank
        ]);

        DB::transaction(function() use($request,$order) {
            // dd(Session::all());
            foreach ($request->qty as $key => $qty) {
                // kurangi stok vendor
                $product = StokModel::where("user_id", $request->vendor)->where("product_id",$request->product_id[$key])->first();
                $tmp = DB::table("tb_tmp_details")->where("user_id", Session::get("costumer_id"))->where("product_id",$request->product_id[$key])->first();

                OrderDetailsModel::create([
                    "order_id" => $order->order_id,
                    "product_id" => $request->product_id[$key],
                    "dicount" => 0,
                    "quantity" => $qty,
                    "capital_price" => $tmp->capital_price,
                    "selling_price" => $tmp->selling_price,
                    "total_price" => (int)$tmp->selling_price * (int)$qty
                ]);
            }
        });
        return redirect()->route('home');
    }
}
