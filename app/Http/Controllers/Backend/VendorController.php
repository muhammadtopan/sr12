<?php

namespace App\Http\Controllers\Backend;

use App\Model\StokModel;
use App\Model\UserModel;
use App\Model\GudangModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TambahMitraRequest;
use App\MitraStok;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = DB::table('tb_user')
            ->leftjoin('tb_vendor', 'tb_user.user_id', '=', 'tb_vendor.user_id')
            ->leftjoin('tb_kota', 'tb_vendor.kota_id', '=', 'tb_kota.kota_id')
            ->where('user_status', '=', 'on')
            ->where('user_level', '!=', 'Freelance')->get();
            
        $vendoroff = DB::table('tb_user')
            ->leftjoin('tb_vendor', 'tb_user.user_id', '=', 'tb_vendor.user_id')
            ->leftjoin('tb_kota', 'tb_vendor.kota_id', '=', 'tb_kota.kota_id')
            ->where('user_status', '!=', 'on')
            ->where('user_level', '!=', 'Freelance')->get();

        $active = 'vendor';
        return view(
            'backend/page/vendor/index',
            [
                'vendor' => $vendor,
                'vendoroff' => $vendoroff,
                'active' => $active
            ]
        );
    }

    public function active(Request $request)
    {
        $product = DB::table('tb_product')
                ->where('product_status', 'on')
                ->get('product_id');

        $id = DB::table('tb_user')
                ->where("username", '=', $request->username)
                ->select('user_id')
                ->first();

        $id_parm = $id->user_id;
        
        DB::table('tb_user')
                ->where('user_id', $id_parm)
                ->update(['user_status' => 'on']);

        $user_id = DB::table('tb_stok')
                ->where('user_id', '=', $id_parm)->get();

        // level !== freelance -> create stok
        $user = DB::table("tb_user")->where("user_id",$id_parm)->first();
        if($user->user_level !== "Freelance") {
            if(count($user_id) == 0){
                foreach($product as $p){
                    DB::table('tb_stok')->insert([
                        'user_id' => $id_parm,
                        'product_id' => $p->product_id,
                        'product_stok' => 0,
                        ]);
                    }
            } else{
                DB::table('tb_stok')
                        ->where('user_id', $id_parm)
                        ->update(['deleted_at' => null]);
            }
        }

        return response()->json([
            'message' => 'VENDOR TELAH AKTIF',
        ], 200);
    }
    public function non_active(Request $request)
    {        
        $id = DB::table('tb_user')
            ->where("username", '=', $request->username)
            ->select('user_id')
            ->first();
        $id_parm = $id->user_id;

        DB::table('tb_user')
            ->where('user_id', $id_parm)
            ->update(['user_status' => 'off']);
        StokModel::where('user_id', '=', $id_parm)
            ->delete();

        return response()->json([
            'message' => 'VENDOR TELAH DI NONAKTIFKAN',
        ], 200);
    }

    public function getDataMitra() {
        $data['provinsi'] = DB::table("tb_provinsi")->get();
        $data['mitra'] = DB::table("tb_gudang")->get();
        $data['active'] = "active";
        return view("backend.page.vendor.mitra.mitra", $data);
    }

    public function createStock($gudang) {
        $product = DB::table("tb_product")->get();
        foreach ($product as $p) {
            MitraStok::create([
                "user_id" => $gudang->id_gudang,
                "product_stok" => 0,
                "product_id" => $p->product_id
            ]);
        }
        return redirect()->back();
    }

    public function postDataMitra(TambahMitraRequest $request, $level = "DU", $leader = null) {
        $gudang = GudangModel::create([
            "id_leader" => $leader === null ? Session::get("admin_id") : $leader,
            "level" => $level,
            "nama_gudang" => $request->nama_gudang,
            "no_wa" => $request->no_wa,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "nik" => $request->nik,
            "tanggal_lahir" => $request->tanggal_lahir,
            "kelamin" => $request->kelamin,
            "prov_id" => $request->prov_id,
            "kota_id" => $request->kota_id,
            "alamat" => $request->alamat,
            "photo_toko" => $request->file("photo_toko")->store("mitra_toko_foto"),
            "selfi_ktp" => $request->file("selfi_ktp")->store("mitra_selfi_ktp")
        ]);
        return $this->createStock($gudang);
    }

}
