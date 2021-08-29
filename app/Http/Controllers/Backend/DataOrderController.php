<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DataOrderController extends Controller
{
    public function index()
    {
        $data['orderan'] = DB::table('tb_order')
                        ->join('tb_costumer', 'tb_order.costumer_id', '=', 'tb_costumer.costumer_id')
                        ->join('tb_user', 'tb_order.user_id', '=', 'tb_user.user_id')
                        ->join('tb_kota', 'tb_order.kota_id', '=', 'tb_kota.kota_id')
                        ->get();

        // dd($data['orderan']);

        $data['active'] = 'orderan';
        return  view('backend.page.orderan.index', $data);
    }
}
