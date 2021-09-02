<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MitraModel;
use App\Model\ProductModel;
use App\Helper\JwtHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mitra/auth/login');
    }

    public function register()
    {
        $prov = DB::table('tb_provinsi')->get();
        $prov2 = DB::table('tb_provinsi')->get();
        $active = "regis";
        return view('frontend/auth_user/register',
        [
        'active' => $active,
        'prov' => $prov,
        'prov2' => $prov2
        ]);
    }

    public function registMitra(Request $request, MitraModel $mitra)
    {
        // dd($request);

        $messages = [
            'mitra_name.required'         => 'Nama Mitra wajib diisi',
            'mitra_name.unique'           => 'Nama Mitra sudah digunakan',
            'mitra_phone.numeric'         => 'Ikuti format nomor telpon yang ada',
            'mitra_phone.unique'         => 'Nomor Whatsapp sudah digunakan, gunakan nomor yang lain',
            'mitra_email.required'        => 'Email wajib diisi',
            'mitra_email.email'           => 'Email tidak valid',
            'mitra_email.unique'          => 'Email sudah terdaftar',
            // 'ktp_number.required'         => 'No. KTP wajib diisi',
            // 'ktp_number.unique'         => 'No. KTP sudah digunakan, silahkan cek kembali no. KTP anda',
            'mitra_ttl.required'          => 'Tanggal lahir wajib diisi',
            'mitra_gender.required'       => 'Jenis kelamin wajib diisi',
            'prov_id.required'            => 'Provinsi wajib diisi',
            'kota_id.required'            => 'Kota wajib diisi',
            'mitra_address.required'      => 'Alamat wajib diisi',
            'mitra_position.required'     => 'Alamat wajib diisi',
            'mitra_password.required'     => 'Password wajib diisi ',
            'mitra_password.min'          => 'Password wajib diisi min 6 karakter',
            'mitra_password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            // 'selfie_ktp.max'            => 'Tipe file harus seperti yang telah ditentukan (jpg,jpeg,png)',
            // 'selfie_ktp.max'            => 'Ukuran file max 200kb',
        ];

        $validator = Validator::make($request->all(), [
            'mitra_name'          => 'required',
            'mitra_phone'         => 'required|numeric|unique:tb_mitra,mitra_phone',
            'mitra_email'         => 'required|email|unique:tb_mitra,mitra_email',
            // 'ktp_number'          => 'required|unique:tb_mitra,ktp_number',
            'mitra_ttl'           => 'required',
            'mitra_gender'        => 'required',
            'prov_id'             => 'required',
            'kota_id'             => 'required',
            'mitra_address'       => 'required',
            'mitra_position'      => 'required',
            // 'selfie_ktp'          => 'nullable|mimes:jpg,jpeg,png',
            // 'selfie_ktp'          => 'nullable|size:200',
            'mitra_password'      => 'required|min:6'
        ], $messages);
        // Pa$$w0rd!
        // dd($validator);

        if ($validator->fails()) {
            return redirect()
                ->route('user.register')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
            $data['mitra_name'] = ucwords(strtolower($request->input('mitra_name')));
            $data['mitra_phone'] = $request->input('mitra_phone');
            $data['mitra_email'] = strtolower($request->input('mitra_email'));
            $data['ktp_number'] = $request->input('ktp_number');
            $data['mitra_ttl'] = $request->input('mitra_ttl');
            $data['mitra_gender'] = $request->input('mitra_gender');
            $data['prov_id'] = $request->input('prov_id');
            $data['kota_id'] = $request->input('kota_id');
            $data['mitra_address'] = $request->input('mitra_address');
            // if ($request->hasFile('selfie_ktp') != null) {
            //     $foto = $request->file('selfie_ktp');
            //     $filename = time() . "." . $foto->getClientOriginalExtension;
            //     $foto->move('img/frontend/img/mitra/' . $filename);
            //     $data['selfie_ktp'] = $filename;
            // }
            $data['mitra_position'] = $request->input('mitra_position');
            $data['mitra_password'] = Hash::make($request->input("mitra_password"));
            $data['mitra_status'] = "off";
            $mitra = MitraModel::create($data);
            return redirect()
                ->route('user.register')
                ->with('message', 'Akun Berhasil Dibuat, tunggu 2x24 jam untuk dihubungi Admin');
        }
    }

    public function loginAdmin(Request $request, MitraModel $costumer)
    {

        // cek data login
        // $admin = new MitraModel();
        $data_costumer = $costumer->CheckLoginCostumer($request->input("costumer_email"), $request->input("costumer_password"));
        // dd($data_costumer);
        if ($data_costumer)
        {
            $token = JwtHelper::BuatToken($data_costumer);

            // masukan data login ke session
            $request->session()->put('costumer_id', $data_costumer->costumer_id);
            $request->session()->put('costumer_name', $data_costumer->costumer_name);
            $request->session()->put('tokenUser', $token);
            // dd($request->session());

            // redirect ke halaman home
            return redirect()
                    ->route('home')
                    ->with("pesan", "Selamat datang " . session('costumer_name'));
        }
        else
        {
            return back()->with("pesan", "Email atau Password Salah");
        }
    }



    function logout(Request $request)
    {
        $request->session()->flush();
        // $request->session()->forget('user_id');
        // $request->session()->forget('username');
        // $request->session()->forget('user_email');
        // $request->session()->forget('user_level');
        // $request->session()->forget('token_vendor');
        // redirect ke halaman home
        return redirect('home')->with("pesan", "Anda Sudah Logout");
    }

    public function profile()
    {
        $active = "akun";
        $akun = DB::table('tb_costumer')
                    ->join('tb_provinsi', 'tb_provinsi.prov_id', '=', 'tb_costumer.prov_id')
                    ->join('tb_kota', 'tb_kota.kota_id', '=', 'tb_costumer.kota_id')
                    ->select('tb_costumer.*', 'tb_provinsi.prov_nama', 'tb_kota.kota_nama')
                    ->first();
        return view('frontend/costumer/profile',
        [   
            'akun' => $akun,
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
