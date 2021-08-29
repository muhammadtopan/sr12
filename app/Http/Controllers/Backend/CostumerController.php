<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CostumerController extends Controller
{
    public function index()
    {
        $data['costumer'] = DB::table('tb_costumer')
                                ->leftjoin('referals', 'tb_costumer.referal', '=', 'referals.referal')
                                ->leftjoin('tb_user', 'referals.user_id', '=', 'tb_user.user_id')
                                ->get();
        $data['active'] = 'costumer';
        return  view('backend.page.costumer.index', $data);
    }

    public function detailCostumer(Request $request)
    {
        $data = DB::table('tb_costumer')
                ->join("tb_kota", "tb_costumer.kota_id", "=", "tb_kota.kota_id")
                ->join("tb_provinsi", "tb_kota.prov_id", "=", "tb_provinsi.prov_id")
                ->where('costumer_id', $request->costumer_id)
                ->first();

        return json_encode($data);
    }
}
