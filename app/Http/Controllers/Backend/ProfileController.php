<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function GetUpdateProfile(?Request $request) {
        $data = DB::table("tb_vendor")->where("user_id",$request->session()->get("user_id"))->first();
        $prov = DB::table("tb_provinsi")->get();
        $kota = DB::table("tb_kota")->get();
        return view("vendor.profile",
        [
            'data' => $data,
            'prov' => $prov,
            'kota' => $kota
        ]);
        // compact("data"));
    }

    public function PutUpdateProfile(Request $request) {
        $data = DB::table("tb_vendor")->where("user_id",$request->session()->get("user_id"))->first();
        if($data) {
            if($request->nama_lengkap === $request->pemilik_rekening) {
                DB::table("tb_vendor")->where("user_id",$request->session()->get("user_id"))->update([
                    "user_id" => $request->session()->get("user_id"),
                    "nama_lengkap" => $request->nama_lengkap,
                    "nik" => $request->nik,
                    "tgl_lahir" =>  $request->tgl_lahir,
                    "prov_id" =>  $request->prov_id,
                    "kota_id" =>  $request->kota_id,
                    "foto_mitra" => $request->file("foto_mitra") !== null ? $request->file("foto_mitra")->store("foto_mitra") : $data->foto_mitra,
                    "alamat_lengkap" => $request->alamat,
                    "bank" => $request->bank,
                    "no_rekening" => $request->no_rekening,
                    "nama_pemilik_rekening" => $request->pemilik_rekening,
                    "selfie_ktp" => $request->file("selfie_ktp") !== null ? $request->file("selfie_ktp")->store("selfie_ktp") : $data->selfie_ktp
                ]);
            } else {
                return redirect()->back();
            }
        } else {
            DB::table("tb_vendor")->insert([
                "user_id" => $request->session()->get("user_id"),
                "nama_lengkap" => $request->nama_lengkap,
                "nik" => $request->nik,
                "tgl_lahir" => $request->tgl_lahir,
                "prov_id" =>  $request->prov_id,
                "kota_id" =>  $request->kota_id,
                "foto_mitra" => $request->file("foto_mitra")->store("foto_mitra"),
                "alamat_lengkap" => $request->alamat,
                "bank" => $request->bank,
                "no_rekening" => $request->no_rekening,
                "saldo" => 0,
                "nama_pemilik_rekening" => $request->pemilik_rekening,
                "selfie_ktp" => $request->file("selfie_ktp")->store("selfie_ktp")
            ]);
        }
        return redirect()->route("vendor.dashboard");
    }
}
