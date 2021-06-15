<?php

namespace App\Http\Controllers\Freelance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Requests\FreelanceLogin;
use App\Model\Referal;
use App\Model\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FreelanceController extends Controller
{
    public function login()
    {
        $data['active'] = '';
        return view('freelance/auth/login', $data);
    }

public function index()
    {
        $data['active'] = 'dashboard';
        $data['freelance'] = DB::table('tb_user')
                        ->where('user_id', Session::get('user_id'));
        // dd($data['freelance']);
        return view('freelance/page/index', $data);
    }

public function profile()
    {
        $referals = DB::table("referals")->where("user_id",Session::get("auth")->user_id)->first();
        $data['referal'] = $referals->referal;
        $data['active'] = 'profile';
        $data['vendor'] = DB::table("tb_vendor")->where("user_id", Session::get("auth")->user_id)->first();
        return view('freelance/page/profile', $data);
    }

    public function getUpdateProfile() {
        $data = [];
        $data['user'] = Session::get('auth');
        $data['vendor'] = DB::table("tb_vendor")->where("user_id",$data['user']->user_id)->first();
        $data['active'] = "";
        return view("freelance.page.update_profile",$data);
    }

public function rtransaksi()
    {
        $data['active'] = 'rtransaksi';
        return view('freelance/page/transaction', $data);
    }

public function raffiliate()
    {
        $data['active'] = 'raffiliate';
        return view('freelance/page/affiliate', $data);
    }

public function deposite()
    {
        $data['active'] = 'deposite';
        return view('freelance/page/deposite', $data);
    }

public function AksiLogin(FreelanceLogin $request) {
        $loginMethod = new UserModel();
        $data = $loginMethod->CheckLoginUser($request->user_email,$request->user_password);
        if($data === false) {
            return back()->with("pesan", "Email atau Password Salah");
        }
        Session::put("auth",$data);
        return redirect()->route("freelance");
    }

    public function AksiRegister(Request $request) {
        $register = new DashboardController();
        $data = $register->LoginMethod($request, new UserModel());

        DB::table("tb_vendor")->insert([
            "user_id" => $data->user_id,
            "nama_lengkap" => $request->nama_lengkap,
            "nik" => $request->nik,
            "tgl_lahir" => $request->tgl_lahir,
            "foto_mitra" => $request->file("foto_mitra")->store("foto_mitra"),
            "alamat_lengkap" => $request->alamat_lengkap,
            "prov_id" => 0,
            "kota_id" => 0,
            "bank" => $request->bank,
            "no_rekening" => $request->no_rekening,
            "saldo" => 0,
            "nama_pemilik_rekening" => $request->nama_pemilik_rekening,
            "selfie_ktp" => $request->file("selfie_ktp")->store("selfie_ktp")
        ]);

        // input referal code
        Referal::create(["user_id" => $data->user_id, "referal" => $data->username.\Str::random(5)]);
        return redirect()->back()->with("pesan", "Registrasi Telah Berhasil, Silahkan Login Untuk Masuk");
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('login.freelance')->with("pesan", "Anda Sudah Logout");
    }

}
