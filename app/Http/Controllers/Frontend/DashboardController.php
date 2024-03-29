<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use App\Helper\JwtHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $active = "login";
        return view('frontend/auth/login',
        [
        'active' => $active
        ]);
    }

    public function register()
    {
        return view('frontend/auth/register');
    }

    public function LoginMethod($request, UserModel $user) {
        $data = $request->all();
        $data['user_password'] = Hash::make($request->input("user_password"));
        $data['username'] = ucwords(strtolower($request->input('username')));
        $data['user_email'] = strtolower($request->input('user_email'));
        $data['user_status'] = "off";
        $user = UserModel::create($data);
        return $user;
    }

    public function registerAdmin(Request $request, UserModel $user)
    {
        $messages = [
            'username.required'         => 'Username wajib diisi',
            'username.unique'           => 'Username sudah digunakan',
            'user_email.required'       => 'Email wajib diisi',
            'user_email.email'          => 'Email tidak valid',
            'user_email.unique'         => 'Email sudah terdaftar',
            'user_phone.numeric'        => 'Ikuti format nomor telpon yang ada',
            'user_password.required'    => 'Password wajib diisi',
            'user_password.confirmed'   => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), [
            'username'           => 'required|unique:tb_user,username',
            'user_email'         => 'required|email|unique:tb_user,user_email',
            'user_phone'         => 'required|numeric|unique:tb_user,user_phone',
            'user_password'      => 'required|min:6'
        ], $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('vendor')
                ->withErrors($validator)
                ->withInput();
        } else {
            $this->LoginMethod($request,new UserModel());
            return redirect()
                ->route('vendor')
                ->with('pesan', 'Akun Berhasil Dibuat, Silahkan Login');
        }
    }

    public function loginAdmin(Request $request, UserModel $user)
    {
        // cek data login
        // $admin = new UserModel();
        $data_user = $user->CheckLoginUser($request->input("user_email"), $request->input("user_password"));
        if ($data_user)
        {
            $token = JwtHelper::BuatToken($data_user);
            // masukan data login ke session
            $request->session()->put('user_id', $data_user->user_id);
            $request->session()->put('username', $data_user->username);
            $request->session()->put('user_level', $data_user->user_level);
            $request->session()->put('user_level', $data_user->user_level);
            $request->session()->put('token_vendor', $token);
            // redirect ke halaman home
            return redirect()
                    ->route('vendor.dashboard')
                    ->with("pesan", "Selamat datang " . session('username'));
        }
        else
        {
            return back()->with("pesan", "Email atau Password Salah");
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('vendor')->with("pesan", "Anda Sudah Logout");
    }

    public function dashboard()
    {
        $name = session()->get('username');
        $active = 'dashboard';
                    return view('vendor/index',
        [
            'name' => $name,
            'active' => $active,
        ]);
    }

    public function carikota(Request $request)
    {
        $kota = DB::table('tb_kota')
            ->where('prov_id', '=', $request->prov_id)
            ->get();
        // dd($kota);
        return response()->json([
            'kota' => $kota,
        ], 200);
    }
}
