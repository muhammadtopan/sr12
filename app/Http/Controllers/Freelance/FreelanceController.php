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
        $data['active'] = 'profile';    
        return view('freelance/page/profile', $data);
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
