<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OrderDetailsModel;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orderan = DB::table('tb_order_details')
                    ->join('contacts', 'users.id', '=', 'contacts.user_id')
                    ->join('orders', 'users.id', '=', 'orders.user_id')
                    ->select('users.*', 'contacts.phone', 'orders.price')
                    ->get();

        return view('frontend/vendor/order');
    }
    
    public function detail_order()
    {
        return view('frontend/vendor/detail_order');
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
