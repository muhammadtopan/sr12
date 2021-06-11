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
        $vendor_dalam_kota = [];
        $vendors = VendorModel::where("kota_id",$kota)->get();
        count($vendors) < 1
        ? $vendors = VendorModel::where("prov_id",$prov)->get()
        : "";
        foreach ($vendors as $v) {
            foreach ($request->qty as $key => $stok) {
                $product = StokModel::where("user_id", $v->user_id)->where("product_stok", ">=", $stok)->where("product_id", $request->product_id[$key])->first();
                if ($product !== null) {
                    $barang = ProductModel::where("product_id",$product->product_id)->first();
                    array_push($vendor_dalam_kota, [
                        "vendor" => $v,
                        "product" => $product,
                        "barang" => $barang
                    ]);
                }
            }
        }
        return $vendor_dalam_kota;
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
            "invoice" => date("dMY")."-".$request->vendor."-".Session::get("costumer_id")."-".\Str::random(5),
            "proof" => $request->file("bukti_transfer")->store("bukti_transfer"),
            "order_address" => $request->alamat_lengkap,
            "kota_id" => $request->kota,
            "order_status" => "waiting",
            "combined_price" => (int)$request->jenis_kirim + (int)$request->total
        ]);

        DB::transaction(function() use($request,$order) {
            // dd(Session::all());
            foreach ($request->qty as $key => $qty) {
                // kurangi stok vendor
                $product = StokModel::where("user_id", $request->vendor)->where("product_id",$request->product_id[$key])->first();
                $tmp = DB::table("tb_tmp_details")->where("user_id", Session::get("costumer_id"))->where("product_id",$request->product_id[$key])->first();

                // input order detail
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
    }
}
