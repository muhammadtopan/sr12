<?php

namespace App\Http\Controllers;

use App\Model\SyaratModel;
use App\Model\ArticelModel;
use App\Model\ProductModel;
use App\Model\CategoryModel;
use Illuminate\Http\Request;
use App\Model\TmpDetailsModel;
use App\Model\TestimonyModel;
use Illuminate\Support\Facades\DB;
use App\Model\PackageCategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

        $paket = DB::table('tb_package_category')->get();

        $productnew = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where('tb_product.product_type','new')
                    ->get();

        $productternew[0] = DB::table('tb_product')
                    ->where('tb_product.product_type','new')
                    ->first();

        $productterbest[0] = DB::table('tb_product')
                    ->where('tb_product.product_type','best')
                    ->first();

        $category = CategoryModel::all();
        $testimony = TestimonyModel::take(10)->get();

        $active = "home";
        return view(
            'frontend/page/home',
            [
                'active' => $active,
                'category' => $category,
                'testimony' => $testimony,
                'allproduct' => $allproduct,
                'product' => $product,
                'paket' => $paket,
                'productnew' => $productnew,
                'productternew' => $productternew[0],
                'productterbest' => $productterbest[0]
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

    public function syarat_mitra()
    {
        $prov = DB::table('tb_provinsi')->get();
        $active = "syarat";
        return view(
            'frontend/page/syarat',
            [
                'active' => $active,
                'prov' => $prov
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
        $qty = DB::table("tb_tmp_details")->where("product_id",$product_id)->where("user_id",Session::get("costumer_id"))->first();
        $active = "product";
        return view(
            'frontend/page/detail_product',
            [
                'active' => $active,
                'package' => $package,
                'category' => $category,
                'product' => $product,
                'relate' => $relate,
                "qty" => $qty
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
