<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use DB;

class FreelanceController extends Controller
{
    public function index()
    {
        $data['freelance'] = DB::table('tb_user')
                    ->leftjoin('tb_vendor', 'tb_user.user_id', '=', 'tb_vendor.user_id')
                    ->leftjoin('tb_kota', 'tb_vendor.kota_id', '=', 'tb_kota.kota_id')
                    ->where('user_status', '=', 'on')
                    ->where('user_level', '=', 'Freelance')->get();

        $data['freelanceoff'] = DB::table('tb_user')
                    ->leftjoin('tb_vendor', 'tb_user.user_id', '=', 'tb_vendor.user_id')
                    ->leftjoin('tb_kota', 'tb_vendor.kota_id', '=', 'tb_kota.kota_id')
                    ->where('user_status', '!=', 'on')
                    ->where('user_level', '=', 'Freelance')->get();

        $data['active'] = "freelance";
        return view('backend.page.freelance.index', $data);
    }

    public function active(Request $request)
    {
        DB::table('tb_user')
            ->where('user_id', $request->id)
            ->update(['user_status' => 'on']);
            $id_parm = $request->id;

        return response()->json([
            'message' => 'FREELANCE TELAH AKTIF',
        ], 200);
    }
    public function non_active(Request $request)
    {
        DB::table('tb_user')
            ->where('user_id', $request->id)
            ->update(['user_status' => 'off']);

        return response()->json([
            'message' => 'FREELANCE TELAH DI NONAKTIFKAN',
        ], 200);
    }
}
