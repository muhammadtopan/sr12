<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductModel;
use DB;

class StockController extends Controller
{
    public function index()
    {
        // cari data produk si vendor
        $product = DB::table('tb_product') 
                ->leftJoin('tb_stok','tb_product.product_id', '=', 'tb_stok.product_id')
                ->where('tb_stok.user_id', '=', session()->get('user_id'))
                ->where('tb_stok.deleted_at', '=', null)
                ->get();

        $stok0 = DB::table('tb_product')
                ->leftJoin('tb_stok','tb_product.product_id', '=', 'tb_stok.product_id')
                ->where('tb_stok.user_id', '=', session()->get('user_id'))
                ->where('tb_stok.product_stok', '=', 0)
                ->where('tb_stok.deleted_at', '=', null)
                ->get();
        
        $active = 'stock';

        return view('vendor/stock',
        [
            'product' => $product,
            'stok0' => $stok0,
            'active' => $active,
        ]);
    }
    public function update(Request $request)
    {
        $stok_id = $request->stock_id;
        DB::table('tb_stok')
                ->where('stok_id', '=', $stok_id)
                ->update([
                    'product_stok' => $request->input('product_stok')
                ]);
        return response()->json([
            'message' => 'PRODUK TELAH DI UPDATE',
        ], 200);
    }
}
