<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CostumerModel;
use App\Model\ProductModel;
use App\Helper\JwtHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class CostumerController extends Controller
{
    public function add_to_cart(Request $request, ProductModel $product)
    {

        // dd($request->session()->get('costumer_id'));
        
        // $this->validate($request, [
            //     'produk_id' => 'required',
            // ]);
        $itemuser = $request->session()->get('costumer_id');
        $itemproduk = $request->product_id;
        // dd($itemproduk );

        if($request->product_id == null){
            // dd($request);
            // tambah
            $validator = Validator::make($request->all(),[
                'category_id'           => 'required',
                'product_name'           => 'required',
                'product_bpom'           => 'required|numeric',
                'product_netto'           => 'required|numeric',
                'product_weight'           => 'required|numeric',
                'product_unit'           => 'required',
                'product_image'         => 'mimes:jpg,jpeg,png',
                'product_price'           => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('product.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('product_image');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/product/', $filename);

                $product->category_id = $request->input('category_id');
                $product->product_name = $request->input('product_name');
                $product->product_bpom = $request->input('product_bpom');
                $product->product_netto = $request->input('product_netto');
                $product->product_weight = $request->input('product_weight');
                $product->product_unit = $request->input('product_unit');
                $product->product_desk = $request->input('product_desk');
                $product->product_price = $request->input('product_price');
                $product->product_status = 'on'; 
                $product->product_type = 'usual'; 
                $product->product_slug = Str::slug($request->input('product_name'));
                $product->product_image = $filename;
                $product->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'category_id'           => 'required',
                'product_name'           => 'required',
                'product_bpom'           => 'required|numeric',
                'product_netto'           => 'required|numeric',
                'product_weight'           => 'required|numeric',
                'product_unit'           => 'required',
                'product_image'         => 'mimes:jpg,jpeg,png',
                'product_price'           => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('product.store', $request->product_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('product_image') != null) {
                    $brg_gmb = DB::table('tb_product')
                                ->where('product_id', '=', $request->product_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/product/' . $brg_gmb->product_image);
                    $foto = $request->file('product_image');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/product/', $filename);

                    DB::table('tb_product')
                        ->where('product_id', '=', $request->product_id)
                        ->update([
                            'category_id' => $request->input('category_id'),
                            'product_name' => $request->input('product_name'),
                            'product_bpom' => $request->input('product_bpom'),
                            'product_netto' => $request->input('product_netto'),
                            'product_weight' => $request->input('product_weight'),
                            'product_unit' => $request->input('product_unit'),
                            'product_desk' => $request->input('product_desk'),
                            'product_price' => $request->input('product_price'),
                            'product_slug' => Str::slug($request->input('product_name')),
                            'product_image' => $filename,
                        ]);

                }else{
                    DB::table('tb_product')
                        ->where('product_id', '=', $request->product_id)
                        ->update([
                            'category_id' => $request->input('category_id'),
                            'product_name' => $request->input('product_name'),
                            'product_bpom' => $request->input('product_bpom'),
                            'product_netto' => $request->input('product_netto'),
                            'product_weight' => $request->input('product_weight'),
                            'product_unit' => $request->input('product_unit'),
                            'product_desk' => $request->input('product_desk'),
                            'product_price' => $request->input('product_price'),
                            'product_slug' => Str::slug($request->input('product_name')),
                        ]);
                }
                return redirect()
                    ->route('product')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function index()
    {
        $prov = DB::table('tb_provinsi')->get();
        $active = "masuk";
        return view('frontend/auth_user/login',
        [
        'active' => $active,
        'prov' => $prov
        ]);
    }

    public function registerAdmin(Request $request, CostumerModel $costumer)
    {
        // dd($request);

        $messages = [
            'costumer_name.required'          => 'costumer_name wajib diisi',
            'costumer_name.unique'            => 'costumer_name sudah digunakan',
            'costumer_email.required'        => 'Email wajib diisi',
            'costumer_email.email'           => 'Email tidak valid',
            'costumer_email.unique'          => 'Email sudah terdaftar',
            'costumer_phone.numeric'          => 'Ikuti format nomor telpon yang ada',
            'costumer_password.required'     => 'Password wajib diisi',
            'costumer_password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), [
            'costumer_name'          => 'required',
            'costumer_email'         => 'required|email|unique:users,email',
            'costumer_phone'         => 'required|numeric',
            'costumer_ttl'           => 'required',
            'costumer_gender'        => 'required',
            'prov_id'                => 'required',
            'kota_id'                => 'required',
            'costumer_address'       => 'required',
            'costumer_password'      => 'required|min:6'
        ], $messages);
        // Pa$$w0rd!
        // dd($validator);

        if ($validator->fails()) {
            return redirect()
                ->route('user.login')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
            $data['costumer_name'] = ucwords(strtolower($request->input('costumer_name')));
            $data['costumer_email'] = strtolower($request->input('costumer_email'));
            $data['costumer_phone'] = $request->input('costumer_phone');
            $data['costumer_ttl'] = $request->input('costumer_ttl');
            $data['costumer_gender'] = $request->input('costumer_gender');
            $data['prov_id'] = $request->input('prov_id');
            $data['kota_id'] = $request->input('kota_id');
            $data['costumer_address'] = $request->input('costumer_address');
            $data['costumer_password'] = Hash::make($request->input("costumer_password"));
            $data['costumer_status'] = "on";
            $costumer = CostumerModel::create($data);
            return redirect()
                ->route('user.login')
                ->with('message', 'Akun Berhasil Dibuat');
        }
    }

    public function loginAdmin(Request $request, CostumerModel $costumer)
    {

        // cek data login
        // $admin = new CostumerModel();
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
        return redirect('user.login')->with("pesan", "Anda Sudah Logout");
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

