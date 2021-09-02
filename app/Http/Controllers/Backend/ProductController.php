<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Model\ProductModel;
use App\Model\CategoryModel;
use App\Model\StokModel;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $product = ProductModel::all()
                    ->where('product_status', '=', 'on');
        $productoff = ProductModel::all()
                    ->where('product_status', '=', 'off');
        $category = CategoryModel::all();
        $active = 'product';
        return view(
            'backend/page/product/index',
            [
                'product' => $product,
                'productoff' => $productoff,
                'category' => $category,
                'active' => $active
            ]
        );
    }

    public function store(Request $request, ProductModel $product)
    {
        if($request->product_id == null){
            // dd($request);
            // tambah
            $validator = Validator::make($request->all(),[
                'category_id'           => 'required',
                'product_name'           => 'required',
                'product_bpom'           => 'required',
                'product_netto'           => 'required|numeric',
                'product_unit_netto'           => 'required',
                'product_weight'           => 'required|numeric',
                'product_unit'           => 'required',
                'product_image'         => 'mimes:jpg,jpeg,png',
                'product_price'           => 'required',
                'product_desk'           => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('product.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('product_image');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/product/', $filename);

                $product->category_id = $request->input('category_id');
                $product->product_name = $request->input('product_name');
                $product->product_bpom = $request->input('product_bpom');
                $product->product_netto = $request->input('product_netto');
                $product->product_unit_netto = $request->input('product_unit_netto');
                $product->product_weight = $request->input('product_weight');
                $product->product_unit = $request->input('product_unit');
                $product->product_desk = $request->input('product_desk');
                $product->product_price = $request->input('product_price');
                $product->product_status = 'on';
                $product->product_slug = Str::slug($request->input('product_name'));
                $product->product_image = $filename;
                $product->save();
                $id = $product->product_id;

                $vendor = DB::table('tb_user')->where('user_status', '=', 'on')->get();
                foreach($vendor as $no => $ven){
                    $asd = DB::table('tb_stok')
                                ->join('tb_user', 'tb_stok.user_id', '=', 'tb_user.user_id')
                                ->where('tb_user.user_level','!=', 'Freelance')
                                ->where('tb_user.user_status','!=', 'on')
                                ->insert([
                            'tb_stok.user_id' => $ven->user_id,
                            'tb_stok.product_id' => $id,
                            'tb_stok.product_stok' => 0,
                            ]);
                    }
                
                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{

            // edit
            $validator = Validator::make($request->all(),[
                'category_id'           => 'required',
                'product_name'           => 'required',
                'product_bpom'           => 'required',
                'product_netto'           => 'required|numeric',
                'product_unit_netto'           => 'required',
                'product_weight'           => 'required|numeric',
                'product_unit'           => 'required',
                'product_image'         => 'mimes:jpg,jpeg,png',
                'product_price'           => 'required',
                'product_desk'           => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('product.store', $request->product_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('product_image') != null) {
                    $brg_gmb = DB::table('tb_product')
                                ->where('product_id', '=', $request->product_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/product/' . $brg_gmb->product_image);
                    $foto = $request->file('product_image');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/product/', $filename);

                    DB::table('tb_product')
                        ->where('product_id', '=', $request->product_id)
                        ->update([
                            'category_id' => $request->input('category_id'),
                            'product_name' => $request->input('product_name'),
                            'product_bpom' => $request->input('product_bpom'),
                            'product_netto' => $request->input('product_netto'),
                            'product_unit_netto' => $request->input('product_unit_netto'),
                            'product_weight' => $request->input('product_weight'),
                            'product_unit' => $request->input('product_unit'),
                            'product_desk' => $request->input('product_desk'),
                            'product_price' => $request->input('product_price'),
                            'product_slug' => Str::slug($request->input('product_name')),
                            'product_image' => $filename,
                        ]);

                }else{
                    DB::table('tb_product')
                        ->where('product_id', '=', $request->product_id)
                        ->update([
                            'category_id' => $request->input('category_id'),
                            'product_name' => $request->input('product_name'),
                            'product_bpom' => $request->input('product_bpom'),
                            'product_netto' => $request->input('product_netto'),
                            'product_unit_netto' => $request->input('product_unit_netto'),
                            'product_weight' => $request->input('product_weight'),
                            'product_unit' => $request->input('product_unit'),
                            'product_desk' => $request->input('product_desk'),
                            'product_price' => $request->input('product_price'),
                            'product_slug' => Str::slug($request->input('product_name')),
                        ]);
                }
                return redirect()
                    ->route('product')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }


    public function destroy(ProductModel $product)
    {
        $product_file = $product->product_image;
        if ($product_file != null) {
            unlink('lte/dist/img/product/' . $product_file);
        }
        $product->forceDelete();

        StokModel::where('product_id', '=', $product->product_id)
            ->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_product(Request $request)
    {

        $data = DB::table('tb_product')
                ->where('product_id','=',$request->product_id)
                ->first();

        return json_encode($data);
    }

    public function active(Request $request)
    {
        DB::table('tb_product')
            ->where('product_id', $request->id)
            ->update(['product_status' => 'on']);
        return response()->json([
            'message' => 'PRODUK TELAH AKTIF',
        ], 200);
    }

    public function non_active(Request $request)
    {
        DB::table('tb_product')
            ->where('product_id', $request->id)
            ->update(['product_status' => 'off']);
        return response()->json([
            'message' => 'PRODUK TELAH DI NONAKTIFKAN',
        ], 200);
    }

    public function best_active(Request $request)
    {
        DB::table('tb_product')
            ->where('product_id', $request->id)
            ->update(['product_best' => 'on']);
        return response()->json([
            'message' => 'PRODUK BIASA AKTIF',
        ], 200);
    }

    public function best_non_active(Request $request)
    {
        DB::table('tb_product')
            ->where('product_id', $request->id)
            ->update(['product_best' => 'off']);
        return response()->json([
            'message' => 'PRODUK BIASA DI NONAKTIFKAN',
        ], 200);
    }

    public function new_active(Request $request)
    {
        DB::table('tb_product')
            ->where('product_id', $request->id)
            ->update(['product_new' => 'on']);
        return response()->json([
            'message' => 'PRODUK BIASA AKTIF',
        ], 200);
    }

    public function new_non_active(Request $request)
    {
        DB::table('tb_product')
            ->where('product_id', $request->id)
            ->update(['product_new' => 'off']);
        return response()->json([
            'message' => 'PRODUK BIASA DI NONAKTIFKAN',
        ], 200);
    }

}
