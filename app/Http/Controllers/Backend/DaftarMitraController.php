<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DaftarMitraController extends Controller
{
    public function index()
    {
        $data['daftarMitra'] = DB::table('tb_mitra')
                    ->join('tb_kota', 'tb_mitra.kota_id', '=', 'tb_kota.kota_id')
                    ->get();
        $data['active'] = 'daftar_mitra';
        return  view('backend.page.daftar_mitra.index', $data);
    }
}
