<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\TmpDetailsModel;
use Session;
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
        $total_price = TmpDetailsModel::where("user_id", $request->session()->get('costumer_id'))->sum('total_price');
        $request->session()->put('total_price', $total_price);
        return redirect()->back();
    }

    public function show()
    {
        $user_id = session()->get("costumer_id");
        $cart = DB::table('tb_tmp_details')
                    ->join('tb_product', 'tb_product.product_id', '=', 'tb_tmp_details.product_id')
                    ->where('user_id', $user_id)
                    ->get();

        $active = '';
        return view('frontend/costumer/cart',
        [
            'active' => $active,
            'cart' => $cart
        ]);
    }

    public function checkout()
    {
        $user_id = session()->get("costumer_id");
        $cart = DB::table('tb_tmp_details')
                    ->join('tb_product', 'tb_product.product_id', '=', 'tb_tmp_details.product_id')
                    ->where('user_id', $user_id)
                    ->get();
        $total_price = TmpDetailsModel::where("user_id", Session::get('costumer_id'))->sum('total_price');
        // dd($total_price);
        $active = '';
        return view('frontend/costumer/checkout',
        [
            'active' => $active,
            'cart' => $cart,
            'total_price' => $total_price
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
    public function destroy(Request $request)
    {
        
        DB::table("tb_tmp_details")->where("order_details_id",$request->id)->delete();
        $total_price = TmpDetailsModel::where("user_id", $request->session()->get('costumer_id'))->sum('total_price');
        $countCart = DB::table('tb_tmp_details')
                    ->where('user_id', Session::get('costumer_id'))
                    ->count();
        $request->session()->put('total_price', $total_price);
        return response()->json([
            'total' => $total_price,
            'barang' => $countCart
            ]);
    }
}

