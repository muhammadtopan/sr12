<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Model\UserModel;
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
        return response()->json([
            'message' => 'VENDOR TELAH AKTIF',
        ], 200);
    }
    public function non_active(Request $request)
    {
        DB::table('tb_user')
            ->where('user_id', $request->id)
            ->update(['user_status' => 'off']);
        return response()->json([
            'message' => 'VENDOR TELAH DI NONAKTIFKAN',
        ], 200);
    }
}
