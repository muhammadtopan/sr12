<?php

namespace App\Http\Controllers\Gudang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMitraRequest;
use App\Model\GudangModel;
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
        $data['active'] = 'mitra';
        return view('gudang/page/mitra', $data);
    }

    public function orderan()
    {
        $data['active'] = 'orderan';
        return view('gudang/page/orderan', $data);
    }

    public function ro()
    {
        $data['active'] = 'ro';
        return view('gudang/page/ro', $data);
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
            $data['active'] = 'history';
            return view('gudang/page/history', $data);
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
