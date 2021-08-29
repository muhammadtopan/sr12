<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\UlasanModel;

class UlasanController extends Controller
{
    public function index()
    {
        $data['ulasan'] = DB::table('tb_ulasan')->get();
        $data['active'] = 'ulasan';
        return  view('backend.page.ulasan.index', $data);
    }

    public function store(Request $request, UlasanModel $ulasan)
    {
        $messages = [
            'ulasan.required'         => 'Silahkan isi ulasan dulu',
            'email.required'         => 'Silahkan isi email dulu',
            'email.email'         => 'Silahkan input email yang benar',
        ];

        $validator = Validator::make($request->all(), [
            'ulasan' => 'required',
            'email' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('home')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
            $data['ulasan'] = $request->input('ulasan');
            $data['email'] = $request->input('email');
            $data['ulasan_status'] = "off";
            
        $ulasan = UlasanModel::create($data);
            return redirect()
                ->back();
        }
    }

    public function active(Request $request)
    {
        DB::table('tb_ulasan')
            ->where('ulasan_id', $request->id)
            ->update(['ulasan_status' => 'on']);

        return response()->json([
            'message' => 'ULASAN TELAH AKTIF',
        ], 200);
    }
    public function non_active(Request $request)
    {
        DB::table('tb_ulasan')
            ->where('ulasan_id', $request->id)
            ->update(['ulasan_status' => 'off']);

        return response()->json([
            'message' => 'ULASAN TELAH DI NONAKTIFKAN',
        ], 200);
    }
}
