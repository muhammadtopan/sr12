<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Backend\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TambahMitraRequest;
use App\Http\Requests\UpdateMitraRequest;
use App\Model\GudangModel;
use App\PesananMitra;
use App\PesananMitraRekap;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GudangController extends Controller
{
    public function getLogin() {
        $data['active'] = 'Login Mitra';
        return view("gudang/page/login", $data);
    }

    public function postLogin(Request $request) {
        $data = DB::table("tb_gudang")->where("email", $request->user_email)->first();
        if(isset($data->id_gudang)) {
            if(Hash::check($request->user_password,$data->password)) {
                Session::put("auth",$data);
                return redirect()->route("gudang.dashboard");
            } else {
                Session::flash("pesan", "Email / Password Salah !!!");
                return redirect()->back();
            }
        } else {
            Session::flash("pesan", "Kamu Tidak Terdaftar !!!");
            return redirect()->back();
        }
    }

    public function index()
    {
        $data['active'] = 'dashboard';
        return view('gudang/page/index', $data);
    }

    public function profile()
    {
        $data['profil'] = Session::get("auth");
        $data['provinsi'] = DB::table("tb_provinsi")->get();
        $data['active'] = 'profile';
        return view('gudang/page/profile', $data);
    }

    public function stock()
    {
        $data['active'] = 'stock';
        return view('gudang/page/stock', $data);
    }

    public function mitra()
    {
        Session::remove("bread");
        $data['provinsi'] = DB::table("tb_provinsi")->get();
        $data['active'] = 'mitra';
        $data['mitra'] = GudangModel::where("id_leader", Session::get("auth")->id_gudang)->get();
        return view('gudang/page/mitra', $data);
    }

    public function postDataMitra(TambahMitraRequest $request) {
        $vendor = new VendorController();
        return $vendor->postDataMitra($request, $request->level, Session::get("auth")->id_gudang);
    }

    // public function deleteDataMitra(GudangModel $m) {
        // $data['active'] = "Orderan";
        // return view("gudang.page.mitra",$data);
    // }

    public function inviteDetailMitra(GudangModel $m) {
        $bread = [];
        if(Session::get("bread") === null) {
            $bread [] = $m->nama_gudang;
            Session::put("bread", $bread);
        } else {
            $search = array_search($m->nama_gudang, Session::get("bread"));
            if($search == 0) {
                Session::push("bread", $m->nama_gudang);
            }
        }
        $data['mitra'] = $m->invited;
        $data['active'] = "invited";
        return view("gudang.page.mitra",$data);
    }

    public function orderan()
    {
        $data['item'] = PesananMitraRekap::where("id_leader", Session::get("auth")->id_gudang)->get();
        $data['active'] = 'orderan';
        return view('gudang/page/orderan', $data);
    }

    public function getStok($id) {
        $data = DB::table("mitra_stoks")->where("user_id",$id)->get();
        return $data;
    }

    public function getBarang($id) {
        return DB::table("tb_product")->where("product_id", $id)->first();
    }

    public function mixData($mitra, $leader) {
        $data = [];
        foreach ($mitra as $key => $m) {
            $barang = $this->getBarang($m->product_id);
            array_push($data, [
                "id_barang" => $barang->product_id,
                "nama_barang" => $barang->product_name,
                "harga_barang" => $barang->product_price,
                "mitra_stok" => $m->product_stok,
                "leader_stok" => $leader[$key]->product_stok
            ]);
        }
        return $data;
    }

    public function ro()
    {
        $auth = Session::get("auth");
        $mitraStok = $this->getStok($auth->id_gudang);
        $leaderStok = $this->getStok($auth->id_leader);
        $data["stok"]  = $this->mixData($mitraStok, $leaderStok);
        $data['active'] = 'ro';
        return view('gudang/page/ro', $data);
    }

    public function pesananMitra($request) {
        $pesananMitra = null;
        $total = 0;
        $action_code = \Str::random(5).date("dmY");
        foreach ($request->id_barang as $key => $ib) {
            if($request->stock_input[$key] > 0) {
                $product = DB::table("tb_product")->where("product_id",$ib)->first();
                $pesananMitra = PesananMitra::create([
                    "mitra_id" => Session::get("auth")->id_gudang,
                    "leader_id" => Session::get("auth")->id_leader,
                    "product_id" => $ib,
                    "jumlah" => $request->stock_input[$key],
                    "status" => "wait",
                    "total" => $request->stock_input[$key] *  $product->product_price,
                    "action_code" => $action_code
                ]);
                $total += $pesananMitra->total;
            }
        }
        return [$pesananMitra,$total,$action_code];
    }

    public function postRo(Request $request) {
        $pesananMitra = $this->pesananMitra($request);
        PesananMitraRekap::create([
            "id_gudang" => Session::get("auth")->id_gudang,
            "id_leader" => Session::get("auth")->id_leader,
            "ongkir" => $request->ongkir,
            "status" => $pesananMitra[0]->status,
            "action_code" => $pesananMitra[2],
            "total_belanja" => $pesananMitra[1]
        ]);
        return redirect()->back();
    }

    public function sale()
    {
        $data['active'] = 'sale';
        return view('gudang/page/sale', $data);
    }

    public function best_seller()
    {
        $data['active'] = 'best_seller';
        return view('gudang/page/best_seller', $data);
    }

        public function history()
        {
            $history = PesananMitraRekap::where("id_gudang", Session::get("auth")->id_gudang)->get();
            $data['history'] = $history;
            $data['active'] = 'history';
            return view('gudang/page/history', $data);
        }

        public function getHistoryTotal($item){
            $total = 0;
            foreach ($item as $i) {
                $total += $i->jumlah * $i->product->product_price;
            }
            return $total;
        }

        public function detailHistory(PesananMitraRekap $h) {
            $data['item'] = $h->pesananMitra;
            $total = $this->getHistoryTotal($data['item']);
            $data['total'] = $total;
            $data['active'] = "detail history";
            return view('gudang/page/detail_history', $data);
        }

    public function profit()
    {
        $data['active'] = 'profit';
        return view('gudang/page/profit', $data);
    }

    public function laporan()
    {
        $data['active'] = 'laporan';
        return view('gudang/page/laporan', $data);
    }

    public function setting()
    {
        $data['active'] = 'setting';
        return view('gudang/page/setting', $data);
    }

    public function UpdateProfile(UpdateMitraRequest $request) {
        $profil = GudangModel::where("id_gudang", Session::get("auth")->id_gudang)->first();
        $update = $profil->update($request->all());
        Session::put("auth", $profil);
        Session::flash("pesan", "Update Data Berhasil");
        return redirect()->route("gudang.profile");
    }

    public function UpdatePassword(Request $request) {
        $request->validate([
            "password_lama" => ["required"],
            "password" => ["required", "confirmed"],
            "password_confirmation" => ["required"]
        ]);
        $profil = Session::get("auth");
        if(Hash::check($request->password_lama, $profil->password)) {
            $data = GudangModel::where("id_gudang",$profil->id_gudang)->first();
            $data->update([
                "password" => Hash::make($request->password)
            ]);
            Session::put("auth",$data);
            Session::flash("pesan", "Update Password Berhasil");
            return redirect()->back();
        }
    }

    public function UpdateFoto(Request $request) {
        $data = GudangModel::where("id_gudang", Session::get("auth")->id_gudang)->first();
        $data->update([
            "photo_toko" => $request->photo_toko === null ? Session::get("auth")->photo_toko : $request->file("photo_toko")->store("mitra_toko_foto"),
            "selfi_ktp" => $request->selfi_ktp === null ? Session::get("auth")->selfi_ktp : $request->file("selfi_ktp")->store("mitra_selfi_ktp")
        ]);
        $request->photo_toko !== null ? Storage::delete(Session::get("auth")->photo_toko) : "";
        $request->selfi_ktp !== null ? Storage::delete(Session::get("auth")->selfi_ktp) : "";
        Session::put("auth", $data);
        Session::flash("pesan", "Update Foto Berhasil");
        return redirect()->back();
    }

}
