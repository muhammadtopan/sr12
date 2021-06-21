<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Model\OrderDetailsModel;
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
                        ->where('order_status', "!=", 'waiting')
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

    public function komisi($order) {
        $total = DB::table("tb_order_details")->where("order_id",$order->order_id)->sum("total_price");
        $costumer = DB::table("tb_costumer")->where("costumer_id",$order->costumer_id)->first();
        if($costumer->referal !== null) {
            $referal = DB::table("referals")->where("referal",$costumer->referal)->first();
            $order = DB::table("tb_order")->where("order_id",$order->order_id)->first();
            $bank = DB::table("tb_bank")->where("bank_name",$order->bank_name)->first();
            $vendor = DB::table("tb_vendor")->where("user_id",$referal->user_id)->first();
            $komisi = ($total * 20 / 100) / 2;

            DB::transaction(function() use($vendor,$komisi, $order, $bank, $total) {
                // input history
                DB::table("tb_saldo")->insert([
                    "user_id" => $vendor->user_id,
                    "kredit" => $komisi,
                    "debit" => 0,
                    "saldo" => $vendor->saldo + $komisi,
                    "desc" => "income",
                    "action_code" => \Str::slug(5)
                ]);
                // saldo bank admin
                DB::table("tb_bank")->where("bank_name",$order->bank_name)->update([
                    "saldo" => $bank->saldo + $komisi
                ]);
                // update komisi vendor
                DB::table("tb_vendor")->where("user_id",$vendor->user_id)->update([
                    "saldo" => $vendor->saldo + ($total - ($komisi * 2))
                ]);
            });
        }
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
        } else if($order->order_status === "sent") {
            DB::transaction(function() use($order) {
                $order->update([
                    "order_status" => "end"
                ]);
                $this->komisi($order);
            });
        }
        return redirect()->back();
    }

}
