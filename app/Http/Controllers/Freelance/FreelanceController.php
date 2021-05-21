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

    public function AksiLogin(FreelanceLogin $request) {
        $loginMethod = new UserModel();
        $data = $loginMethod->CheckLoginUser($request->user_email,$request->user_password);
        if($data === false) {
            return back()->with("pesan", "Email atau Password Salah");
        }
        Session::put("auth",$data);
    }

    public function AksiRegister(Request $request) {
        $register = new DashboardController();
        $data = $register->LoginMethod($request, new UserModel());

        // input referal code
        Referal::create(["user_id" => $data->user_id, "referal" => $data->username.\Str::random(5)]);
    }

}
