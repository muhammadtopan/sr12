<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $product_id)
    {
        $user_id = $request->session()->get("costumer_id");
        $product = DB::table("tb_product")->where("product_id",$product_id)->first();
        $old = DB::table("tb_tmp_details")->where("product_id",$product_id)->where("user_id",$user_id)->first();
        $data = [
            "user_id" => $user_id,
            "product_id" => $product_id,
            "dicount" => 0,
            "quantity" => $request->qty,
            "capital_price" => $product->product_price,
            "selling_price" => $product->product_price,
            "total_price" => $request->qty * $product->product_price
        ];
        $old == null
        ? DB::table("tb_tmp_details")->insert($data)
        : DB::table("tb_tmp_details")->where("product_id",$product_id)->where("user_id",$user_id)->update($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $active = '';
        return view('frontend/costumer/cart',
        [
            'active' => $active
        ]);
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

