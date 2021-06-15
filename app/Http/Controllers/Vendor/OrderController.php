<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OrderModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        // dd(Session::get('user_id'));
        $orderan = DB::table('tb_order')
                        ->where('tb_order.user_id', Session::get('user_id'))
                        ->where('order_status', 'waiting')
                        ->get();

        $orderanh = DB::table('tb_order')
                        ->where('tb_order.user_id', Session::get('user_id'))
                        ->where('order_status', 'end')
                        ->get();

        return view('vendor/order',
        [
            'orderan' => $orderan,
            'orderanh' => $orderanh
        ]
    );
    }

    public function detail_order($order)
    {
        $order_detail = DB::table('tb_order_details')
                        ->join('tb_order','tb_order_details.order_id', '=', 'tb_order.order_id')
                        ->join('tb_product','tb_order_details.product_id', '=', 'tb_product.product_id')
                        ->join('tb_costumer','tb_order.costumer_id', '=', 'tb_costumer.costumer_id')
                        ->get();
        // dd($order_detail[0]);
        return view('vendor/detail_order',
        [
            'order_detail' => $order_detail
        ]
    );
    }

    public function update_status(Request $request, $order) {
        $order = OrderModel::where("order_id",(int)$order)->first();
        if($order->order_status === "waiting") {
            $order->update([
                "order_status" => "processed"
            ]);
        } else if($order->order_status === "processed") {
            $order->update([
                "order_status" => "sent",
                "noresi" => (int)$request['noresi']
            ]);
        }
        return redirect()->back();
    }

}
