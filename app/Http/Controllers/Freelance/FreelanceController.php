<?php

namespace App\Http\Controllers\Freelance;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Requests\FreelanceLogin;
use Illuminate\Support\Facades\Validator;
use App\Model\Referal;
use App\Model\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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

    public function getUpdateProfile() 
    {
        $data = [];
        $data['user'] = Session::get('auth');
        $data['vendor'] = DB::table("tb_vendor")->where("user_id",$data['user']->user_id)->first();
        $data['prov'] = DB::table('tb_provinsi')->get();
        $data['kota'] = DB::table("tb_kota")->where("prov_id",$data['vendor']->prov_id)->get();
        $data['active'] = "profile";
        return view("freelance.page.update_profile",$data);
    }

    public function putUpdateProfile(Request $request) 
    {
        $messages = [
            'nama_lengkap.required'                 => 'Nama lengkap wajib diisi',
            'nama_lengkap.confirmed'                => 'Nama pemilik rekening harus atas nama sendiri',
            'username.required'                     => 'Username wajib diisi',
            'email.required'                        => 'Email wajib diisi',
            'email.email'                           => 'Email tidak valid',
            'prov_id.required'                      => 'Provinsi wajib diisi',
            'kota_id.required'                      => 'Kota wajib diisi',
            'alamat_lengkap.required'               => 'Alamat wajib diisi',
            'nik.required'                          => 'NIK wajib diisi',
            'nik.numeric'                           => 'NIK berupa angka',
            'no_telpon.numeric'                     => 'Ikuti format nomor telpon yang ada',
            'tgl_lahir.required'                    => 'Tanggal lahir wajib diisi',
            'bank.required'                         => 'Bank wajib diisi',
            'nama_lengkap_confirmation.required'    => 'Nama peilik rekening wajib diisi',
            'no_rekening.required'                  => 'Nomor rekening wajib diisi',
            'no_rekening.numeric'                   => 'Nomor rekening berupa angka',
        ];

        $validator = Validator::make($request->all(), [
            'nama_lengkap'      => 'required|confirmed',
            'username'          => 'required',
            'email'             => 'required|email',
            'prov_id'           => 'required',
            'kota_id'           => 'required',
            'alamat_lengkap'    => 'required',
            'nik'               => 'required|numeric',
            'no_telpon'         => 'required|numeric',
            'tgl_lahir'         => 'required',
            'bank'              => 'required',
            'no_rekening'       => 'required|numeric',
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else {
                DB::transaction(function() use($request) {
                    // update user
                    DB::table("tb_user")->where("user_id",Session::get("auth")->user_id)->update([
                        "username" => $request->username,
                        "user_email" => $request->email,
                        "user_phone" => $request->no_telpon,
                    ]);

                    // update vendor
                    DB::table("tb_vendor")->where("user_id", Session::get("auth")->user_id)->update([
                        "nama_lengkap" => $request->nama_lengkap,
                        "nik" => $request->nik,
                        "tgl_lahir" => $request->tgl_lahir,
                        "alamat_lengkap" => $request->alamat_lengkap,
                        "prov_id" => $request->prov_id,
                        "kota_id" => $request->kota_id,
                        "bank" => $request->bank,
                        "no_rekening" => $request->no_rekening,
                        "nama_pemilik_rekening" => $request->nama_lengkap_confirmation
                    ]);
                });
            return redirect()->back();
        }
    }

    public function GetUpdatePhoto() {
        $data['vendor'] = DB::table("tb_vendor")->where("user_id",Session::get("auth")->user_id)->first();
        $data['active'] = "profile";
        return view("freelance.page.update_photo", $data);
    }

    
    public function PutUpdatePhoto(Request $request) {
        $request->validate(["foto_mitra" => "required"]);
        $vendor = DB::table("tb_vendor")->where("user_id", Session::get("auth")->user_id)->first();
        Storage::delete($vendor->foto_mitra);
        DB::table("tb_vendor")->where("user_id",Session::get("auth")->user_id)->update([
            "foto_mitra" => $request->file("foto_mitra")->store("foto_mitra")
        ]);
        return redirect()->back();
    }
    
    public function GetUpdatePass() {
        $data['vendor'] = DB::table("tb_vendor")->where("user_id",Session::get("auth")->user_id)->first();
        $data['active'] = "profile";
        return view("freelance.page.update_pass", $data);
    }

    public function PutUpdatePass(Request $request) {
        $messages = [
            'password_baru.required'            => 'Password baru wajib diisi',
            'password_baru.confirmed'           => 'Konfirmasi password gagal',
            'password_baru_confirmed.required'  => 'Tolong isi konfirmasi password',
            
        ];

        $validator = Validator::make($request->all(), [
            'password_baru'           => 'required|confirmed'
        ], $messages);
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else {
                DB::transaction(function() use($request) {
                    // update user
                    DB::table("tb_user")->where("user_id",Session::get("auth")->user_id)->update([
                        "user_password" => Hash::make($request->input("password_baru"))
                    ]);
                });
            return redirect()
                    ->route("freelance.profile");
        }
    }

    public function rtransaksi()
    {
        $transaksi = DB::table("tb_saldo")->where("desc","income")->where("user_id",Session::get("auth")->user_id)->orderBy("saldo_id", "desc")->get();
        $data['active'] = 'rtransaksi';
        $data['transaksi'] = $transaksi;
        return view('freelance/page/transaction', $data);
    }

    public function raffiliate()
    {
        $referal = DB::table("referals")->where("user_id", Session::get("auth")->user_id)->first();
        $costumer = DB::table("tb_costumer")->where("referal",$referal->referal)->get();
        $order = [];
        foreach ($costumer as $c) {
            $order_referal = DB::table("tb_order")->where("costumer_id",$c->costumer_id)->where("order_status","end")->get();
            $order [] = $order_referal;
        }
        $data['order'] = $order;
        $data['active'] = 'raffiliate';
        return view('freelance/page/affiliate', $data);
    }

public function deposite()
    {
        $transaksi = DB::table("tb_saldo")->where("desc","withdrawal")->where("user_id",Session::get("auth")->user_id)->orderBy("saldo_id", "desc")->get();
        $data['active'] = 'deposite';
        $data['transaksi'] = $transaksi;
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
                ->route('freelance')
                ->withErrors($validator)
                ->withInput();
        } else {
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

            return redirect()
                ->route('vendor')
                ->with('pesan', 'Akun Berhasil Dibuat, Silahkan Login');
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.freelance')->with("pesan", "Anda Sudah Logout");
    }

}
