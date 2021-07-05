<?php

namespace App\Http\Controllers\Gudang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\CheckoutController;
use App\Model\GudangModel;

class OngkirController extends Controller
{
    public function getBarang($barang) {
        $total = 0;
        $konversi = new CheckoutController();
        foreach ($barang as $b) {
            $data = json_decode($b,true);
            $product = DB::table("tb_product")->where("product_id", $data["id"])->first();
            $berat = $konversi->konversiBerat($product->product_weight, $product->product_unit, $data["jumlah"]);
            $total += $berat;
        }
        return $berat;
    }

    public function getDataUser($id) {
        return GudangModel::where("id_gudang",$id)->first();
    }

    public function getOngkir(Request $request) {
        $getOngkir = new CheckoutController();
        $berat = ceil($this->getBarang($request->idBarang));
        $gudang = $this->getDataUser($request->idGudang);
        $leader = $this->getDataUser($gudang->id_leader);
        $ongkir = $getOngkir->getOngkir($leader->kota_id, $gudang->kota_id, $berat);
        return response()->json($ongkir);
    }
}
