<?php

namespace App\Http\Controllers\Vendor;

use Carbon\Carbon;
use App\Model\StokModel;
use App\Model\OrderModel;
use Illuminate\Http\Request;
use App\Model\OrderDetailsModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
        
        $active = 'orderan';
        
        return view('vendor/order',
        [
            'orderan' => $orderan,
            'orderanh' => $orderanh,
            'active' => $active,
        ]
    );
    }

    public function detail_order($order)
    {
        $order_detail = DB::table('tb_order_details')
                        ->join('tb_order','tb_order_details.order_id', '=', 'tb_order.order_id')
                        ->join('tb_costumer','tb_order.costumer_id', '=', 'tb_costumer.costumer_id')
                        ->join('tb_product','tb_order_details.product_id', '=', 'tb_product.product_id')
                        ->join("tb_kota", "tb_kota.kota_id", "tb_order.kota_id")
                        ->where("tb_order.order_id",$order)
                        ->get();

        $active = 'orderan';
        return view('vendor/detail_order',
        [
            'order_detail' => $order_detail,
            'active' => $active,
        ]
    );
    }

    public function komisi($order) {
        $total = DB::table("tb_order_details")->where("order_id",$order->order_id)->sum("total_price");
        $costumer = DB::table("tb_costumer")->where("costumer_id",$order->costumer_id)->first();
        $bank = DB::table("tb_bank")->where("bank_name",$order->bank_name)->first();
        $komisi = ($total * 20 / 100) / 2;
        if($costumer->referal !== null) {
            $referal = DB::table("referals")->where("referal",$costumer->referal)->first();
            $freelance = DB::table("tb_vendor")->where("user_id",$referal->user_id)->first();
            $vendor = DB::table("tb_vendor")->where("user_id", $order->user_id)->first();
            DB::transaction(function() use($freelance,$komisi, $order, $bank, $total, $vendor) {
                // input history
                DB::table("tb_saldo")->insert([
                    "user_id" => $freelance->user_id,
                    "kredit" => $komisi,
                    "debit" => 0,
                    "saldo" => $freelance->saldo + $komisi,
                    "desc" => "income",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "action_code" => \Str::random(14)
                ]);
                // saldo bank admin
                DB::table("tb_bank")->where("bank_name",$order->bank_name)->update([
                    "saldo" => $bank->saldo + $komisi
                ]);
                // update komisi freelance
                DB::table("tb_vendor")->where("user_id",$freelance->user_id)->update([
                    "saldo" => $freelance->saldo + $komisi
                ]);
                // update saldo vendor
                DB::table("tb_vendor")->where("user_id",$order->user_id)->update([
                    "saldo" => $vendor->saldo + ($total - ($komisi * 2))
                ]);
            });
            return $komisi;
        } else {
            DB::table("tb_bank")->where("bank_name",$order->bank_name)->update([
                "saldo" => $bank->saldo + $komisi * 2
            ]);
            return 0;
        }
    }

    public function update_status(Request $request, $order) {
        $order = OrderModel::where("order_id",(int)$order)->first();
        if($order->order_status === "waiting") {
            $order->update([
                "order_status" => "processed"
            ]);
        } else if($order->order_status === "processed") {
            $order_detail = DB::table("tb_order_details")->where("order_id", $order->order_id)->first(["quantity", "product_id"]);
            $stok = StokModel::where("user_id", Session::get("user_id"))->where("product_id",$order_detail->product_id)->first();
            $stok->update([
                "product_stok" => $stok->product_stok - $order_detail->quantity
            ]);
            $order->update([
                "order_status" => "sent",
                "noresi" => (int)$request['noresi']
            ]);
        } else if($order->order_status === "sent") {
            DB::transaction(function() use($order) {
                $komisi = $this->komisi($order);
                $order->update([
                    "order_status" => "end",
                    "komisi" => $komisi,
                ]);
            });
        }
        return redirect()->back();
    }

}
