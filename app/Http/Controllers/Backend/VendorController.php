<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Model\UserModel;
use App\Model\StokModel;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index()
    {
        $vendor = UserModel::all()
                ->where('user_status', '=', 'on');
        $vendoroff = UserModel::all()
                ->where('user_status', '=', 'off');
        return view(
            'backend/page/vendor/index',
            [
                'vendor' => $vendor,
                'vendoroff' => $vendoroff
            ]
        );
    }

    public function active(Request $request)
    {
        DB::table('tb_user')
            ->where('user_id', $request->id)
            ->update(['user_status' => 'on']);
            $id_parm = $request->id;

            $product = DB::table('tb_product')->get('product_id');
            $user_id = DB::table('tb_stok')
                    ->where('user_id', '=', $id_parm)->get();
            // dd($user_id);
            if(count($user_id) == 0){
                foreach($product as $p){
                    DB::table('tb_stok')->insert([
                        'user_id' => $request->id,
                        'product_id' => $p->product_id,
                        'product_stok' => 0,
                        ]);
                    }
                }else{
                    DB::table('tb_stok')
                    ->where('user_id', $request->id)
                    ->update(['deleted_at' => null]);
                }

        return response()->json([
            'message' => 'VENDOR TELAH AKTIF',
        ], 200);
    }
    public function non_active(Request $request)
    {
        DB::table('tb_user')
            ->where('user_id', $request->id)
            ->update(['user_status' => 'off']);
        
            StokModel::where('user_id', '=', $request->id)
            ->delete();

        return response()->json([
            'message' => 'VENDOR TELAH DI NONAKTIFKAN',
        ], 200);
    }
}
