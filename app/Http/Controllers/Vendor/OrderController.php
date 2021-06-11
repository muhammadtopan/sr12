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
    
        return view('frontend/vendor/order', 
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
                        ->where('tb_order_details.order_details_id', $order)
                        ->get();
        // dd($order_detail[0]);
        return view('frontend/vendor/detail_order',
        [
            'order_detail' => $order_detail[0]
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
