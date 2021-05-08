<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\CategoryModel;
use App\Model\ProductModel;
use App\Model\PackageCategoryModel;

class HomeController extends Controller
{
    public function index()
    {
        $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where('tb_product.product_type','best')
                    ->get();
                    
        $productnew = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where('tb_product.product_type','new')
                    ->get();

        $category = CategoryModel::all();

        $active = "home";
        return view(
            'frontend/page/home',
            [
                'active' => $active,
                'category' => $category,
                'product' => $product,
                'productnew' => $productnew
            ]
        );
    }

    public function about()
    {
        $active = "about";
        return view(
            'frontend/page/about',
            [
                'active' => $active
            ]
        );
    }

    public function product()
    {
        $package = PackageCategoryModel::all();
        $category = CategoryModel::all();
        $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->get();

        $active = "product";
        return view(
            'frontend/page/product',
            [
                'active' => $active,
                'package' => $package,
                'category' => $category,
                'product' => $product,
            ]
        );
    }
    
    public function detail_product($product_id)
    {
        $package = PackageCategoryModel::all();
        $category = CategoryModel::all();
        $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.product_id",$product_id)
                    ->first();
                    // dd($product);
        $relate = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where('tb_product.category_id',$product->category_id)
                    ->get();


        $active = "product";
        return view(
            'frontend/page/detail_product',
            [
                'active' => $active,
                'package' => $package,
                'category' => $category,
                'product' => $product,
                'relate' => $relate
            ]
        );
    }

    public function partnership()
    {
        $active = "partnership";
        return view(
            'frontend/page/partnership',
            [
                'active' => $active
            ]
        );
    }

    public function contact()
    {
        $active = "contact";
        return view(
            'frontend/page/contact',
            [
                'active' => $active
            ]
        );
    }
}
