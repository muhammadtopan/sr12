<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User_Model;
use App\AdminModel;
use App\Helper\JwtHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend/auth/login');
    }

    public function register()
    {
        return view('backend/auth/register');
    }

    public function registerAdmin(Request $request, AdminModel $admin)
    {

        $validator = Validator::make($request->all(), [
            'admin_name'          => 'required',
            'admin_email'         => 'required|email',
            'admin_password'      => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('register')
                ->withErrors($validator)
                ->withInput();
        } else {

            $admin->admin_name = $request->input('admin_name');
            $admin->admin_email = $request->input('admin_email');
            $admin->admin_password = Hash::make($request->input('admin_password'));
            $admin->admin_phone = '082386464060';
            $admin->admin_level = 'admin';
            $admin->save();

            return redirect()
                ->route('login')
                ->with('message', 'Data berhasil ditambahkan');
        }
    }

    public function loginAdmin(Request $request)
    {
        // cek data login
        $admin = new AdminModel();
        $data_admin = $admin->CheckLoginAdmin($request->input("admin_email"), $request->input("admin_password"));
        if ($data_admin)
        {
            $token = JwtHelper::BuatToken($data_admin);
            if($data_admin->admin_level=='admin'){
                // masukan data login ke session
                $request->session()->put('admin_id', $data_admin->admin_id);
                $request->session()->put('admin_name', $data_admin->admin_name);
                $request->session()->put('admin_level', $data_admin->admin_level);
                $request->session()->put('token', $token);
                // redirect ke halaman home
                return redirect()->route('admin.dashboard')->with("pesan", "Selamat datang " . session('admin_name'));
            }
            else{
                return back()->with("pesan", "Email atau Password Salah");
            }
        }
        else
        {
            return back()->with("pesan", "Email atau Password Salah");
        }
    }



    function logout(Request $request)
    {
        $request->session()->flush();
        // $request->session()->forget('admin_id');
        // $request->session()->forget('admin_name');
        // $request->session()->forget('email');
        // $request->session()->forget('level');
        // $request->session()->forget('token');
        // redirect ke halaman home
        return redirect('login')->with("pesan", "Anda Sudah Logout");
    }

    public function dashboard()
    {
        $data['active'] = 'dashboard';
        return view('backend/page/home', $data);
    }
}
