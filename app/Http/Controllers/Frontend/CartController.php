<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\TmpDetailsModel;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\CheckoutController;
use App\Model\ProductModel;
use App\TmpDetail;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function store(Request $request, $product_id)
    {
        $user_id = $request->session()->get("costumer_id");
        $product = DB::table("tb_product")->where("product_id",$product_id)->first();
        $old = TmpDetailsModel::where("product_id",$product_id)->where("user_id",$user_id)->first();
        $data = [
            "user_id" => $user_id,
            "product_id" => $product_id,
            "dicount" => 0,
            "quantity" => $request->qty,
            "capital_price" => $product->product_price,
            "selling_price" => $product->product_price,
            "total_price" => $request->qty * $product->product_price
        ];
        if($old != null) {
            $old->update($data);
        } else {
            TmpDetailsModel::create($data);
        }

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

    public function checkout(Request $request)
    {
        $cart = [];
        $product_id = [];
        $qty = [];
        $total_price = 0;
        $checkout = new CheckoutController();
        $continueProses = $request->checkout;
        $user_id = session()->get("costumer_id");
        $user = DB::table("tb_costumer")->where("costumer_id",$user_id)->first();
        $vendor_dalam_kota = $checkout->getVendorDalamKota($user->prov_id,$user->kota_id, $request);
        $bank = DB::table("tb_bank")->get();

        foreach ($continueProses as $key => $c) {
            $data =  DB::table('tb_tmp_details')
                        ->join('tb_product', 'tb_product.product_id', '=', 'tb_tmp_details.product_id')
                        ->where("order_details_id", $request->order_details_id[$key])
                        ->where('user_id', $user_id)
                        ->first();
            $cart[] = $data;
            $product_id[] = $data->product_id;
            $qty[] = $data->quantity;
            $total_price += $data->quantity * $data->selling_price;
        }
        // $total_price = TmpDetailsModel::where("user_id", Session::get('costumer_id'))->sum('total_price');
        $provinsi = DB::table("tb_provinsi")->get();
        $kota = DB::table("tb_kota")->where("prov_id",$user->prov_id)->get();
        $active = '';
        return view('frontend/costumer/checkout',
        [
            "continue" => $continueProses,
            'active' => $active,
            "user" => $user,
            "bank" => $bank,
            'cart' => $cart,
            "kota" => $kota,
            "provinsi" => $provinsi,
            'total_price' => $total_price,
            "vendor" => $vendor_dalam_kota,
            "qty" => $qty,
            "product_id" => $product_id
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

