<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\CategoryModel;
use App\Model\ProductModel;
use App\Model\PackageCategoryModel;
use App\Model\ArticelModel;
use App\Model\SyaratModel;
use App\Model\TestimonyModel;

class HomeController extends Controller
{
    public function index()
    {
        $allproduct = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->limit(13)
                    ->get();
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
        $testimony = TestimonyModel::all();

        $active = "home";
        return view(
            'frontend/page/home',
            [
                'active' => $active,
                'category' => $category,
                'testimony' => $testimony,
                'allproduct' => $allproduct,
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

    public function frontMitra()
    {
        $active = "login_mitra";
        return view(
            'frontend/page/mitra',
            [
                'active' => $active
            ]
        );
    }

    public function tool()
    {
        $active = "tool";
        return view(
            'frontend/page/tool',
            [
                'active' => $active
            ]
        );
    }

    public function articel($art)
    {
        $articel = ArticelModel::first();
        $articles = ArticelModel::all();
        $articelss = TestimonyModel::all();
        $active = "articel";
        return view(
            'frontend/page/articel',
            [
                'active' => $active,
                'articel' => $articel,
                'articles' => $articles,
                'articelss' => $articelss
            ]
        );
    }

    public function testimony($art)
    {
        $testimony = TestimonyModel::first();
        $testimonyss = TestimonyModel::all();
        $active = "testimony";
        return view(
            'frontend/page/testimony',
            [
                'active' => $active,
                'testimony' => $testimony,
                'testimonyss' => $testimonyss
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
        // $srt = SyaratModel::first();
        $syarat = DB::table('tb_syarat')->get();
        return view(
            'frontend/page/partnership',
            [
                'active' => $active,
                // 'srt' => $srt,
                'syarat' => $syarat
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
