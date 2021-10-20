<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Model\PackageCategoryModel;
use App\Model\ProductPackageModel;
use App\Model\ProductModel;
use App\Model\Category_o_Product_Package_Model;
use Illuminate\Support\Str;

class PackageCategoryController extends Controller
{
    public function index()
    {
        $category = PackageCategoryModel::all();
        $product = ProductModel::all();
        $category_opp = Category_o_Product_Package_Model::all();
        $active = 'product_package';
        return view(
            'backend/page/package_category/index',
            [
                'category' => $category,
                'category_opp' => $category_opp,
                'product' => $product,
                'active' => $active
            ]
        );
    }

    public function cari_kategori_paket(Request $request)
    {
        $produk = DB::table('tb_package_category')
                ->where('package_category_id','=',$request->package_category_id)
                ->first();

        $detail = DB::table('tb_product_package')
                ->select('product_id')
                ->where('package_category_id', '=', $request->package_category_id)
                ->get();

        return json_encode([
            'produk' => $produk,
            'detail' => $detail
        ]);
    }

    public function store(Request $request, PackageCategoryModel $category, ProductPackageModel $product)
    {
        // dd($request->all());
        $p = $request->input('product');
        $id_product = array_keys($p);
        // dd($p);

        $price = DB::table('tb_product')
                    ->whereIn('product_id', $id_product)
                    ->select(DB::raw('SUM(product_price) as total_price'))
                    ->first();
        // dd($price->total_price);
        if($request->package_category_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'category_opp_id'           => 'required',
                'package_category_name'     => 'required',
                'package_category_step'     => 'required',
                'package_category_image'    => 'required|mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('package_category.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('package_category_image');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/package_category/', $filename);

                // inseret ke tb packeage
                $category->category_opp_id = $request->input('category_opp_id');
                $category->package_category_name = $request->input('package_category_name');
                $category->package_category_step = $request->input('package_category_step');
                $category->package_category_status = 'on';
                $category->package_category_price = $price->total_price;
                $category->package_category_slug = Str::slug($request->input('package_category_name'));
                $category->package_category_image = $filename;
                $category->save();
                $category->package_category_id;

                // ambil id terakhir packege
                
                // looping produk yg di ceklis
                foreach($p as $no => $products){
                    ProductPackageModel::create([
                        "package_category_id" => $category->package_category_id,
                        "product_id" => $no,
                    ]);
                }   

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'category_opp_id'           => 'required',
                'package_category_name'           => 'required',
                'package_category_step'           => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('package_category.store', $request->package_category_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                DB::table('tb_product_package')
                                    ->where('package_category_id', '=', $request->package_category_id)
                                    ->delete();
                if ($request->hasFile('package_category_image') != null) {
                    $brg_gmb = DB::table('tb_package_category')
                                ->where('package_category_id', '=', $request->package_category_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/package_category/' . $brg_gmb->package_category_image);
                    $foto = $request->file('package_category_image');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/package_category/', $filename);
                    
                    DB::table('tb_package_category')
                        ->where('package_category_id', '=', $request->package_category_id)
                        ->update([
                            'category_opp_id' => $request->input('category_opp_id'),
                            'package_category_name' => $request->input('package_category_name'),
                            'package_category_step' => $request->input('package_category_step'),
                            'package_category_price' => $price->total_price,
                            'package_category_slug' => Str::slug($request->input('package_category_name')),
                            'package_category_image' => $filename
                        ]);
                    foreach($p as $no => $products){
                        ProductPackageModel::create([
                            "package_category_id" => $request->package_category_id,
                            "product_id" => $no,
                        ]);
                    }   

                }else{

                    DB::table('tb_package_category')
                        ->where('package_category_id', '=', $request->package_category_id)
                        ->update([
                            'category_opp_id' => $request->input('category_opp_id'),
                            'package_category_name' => $request->input('package_category_name'),
                            'package_category_step' => $request->input('package_category_step'),
                            'package_category_price' => $price->total_price,
                            'package_category_slug' => Str::slug($request->input('package_category_name')),
                        ]);
                        
                        foreach($p as $no => $products){
                            ProductPackageModel::create([
                                "package_category_id" => $request->package_category_id,
                                "product_id" => $no,
                            ]);
                        }   
                }
                return redirect()
                    ->route('package_category')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(PackageCategoryModel $package_category)
    {
        $category_file = $package_category->package_category_image;
        if ($category_file != null) {
            unlink('lte/dist/img/package_category/' . $category_file);
        }
        $package_category->forceDelete();

        DB::table('tb_product_package')
            ->where('package_category_id', '=', $package_category->package_category_id)
            ->delete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }
}
