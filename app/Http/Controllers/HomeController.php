<?php

namespace App\Http\Controllers;

use App\Model\SyaratModel;
use App\Model\ArticelModel;
use App\Model\ProductModel;
use App\Model\CategoryModel;
use Illuminate\Http\Request;
use App\Model\TmpDetailsModel;
use App\Model\TestimonyModel;
use App\Model\ViewerSyaratModel;
use Illuminate\Support\Facades\DB;
use App\Model\PackageCategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


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
                    ->where('tb_product.product_best','on')
                    ->get();

        $paket = DB::table('tb_package_category')->get();

        $productnew = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where('tb_product.product_new','on')
                    ->get();

        $productternew[0] = DB::table('tb_product')
                    ->where('tb_product.product_new','on')
                    ->first();

        $productterbest[0] = DB::table('tb_product')
                    ->where('tb_product.product_best','on')
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
    public function carimitra($id)
    {
        $mitra = DB::table('tb_mitra')->where('kota_id', $id)->get();
        return view('frontend.page.list_mitra', compact('mitra'));
    }

    public function viewerSyarat(Request $request, ViewerSyaratModel $viewer)
    {
        // dd($request->session());
        $messages = [
            'name_viewer.required'  => 'Nama wajib diisi',
            'phone.required'        => 'Nomor telfon wajib diisi',
            'phone.numeric'         => 'Ikuti format nomor telpon yang ada',
        ];

        $validator = Validator::make($request->all(), [
            'name_viewer'    => 'required',
            'phone'          => 'required|numeric',
        ], $messages);

        // dd($validator->fails());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = $request->all();
            $data['name_viewer'] = ucwords(strtolower($request->input('name_viewer')));
            $data['phone'] = $request->input('phone');
            $viewer = ViewerSyaratModel::create($data);
            $sviewer = $request->session()->put('phone_viewer', $request->input('phone'));
            // dd($sviewer);
            return redirect()
                ->route('syarat_mitra');
        }
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

    public function articel($id)
    {
        $articles = DB::table('tb_article')->get();
        $categories = DB::table('tb_article_category')->get();
        
        // dd($categories);
        $artikel = DB::table('tb_article')->where('article_id', $id)->get();
        $active = "articel";
        // dd($artikel[0]);
        return view(
            'frontend/page/articel',
            [
                'active' => $active,
                'articles' => $articles,
                'ctg' => $categories,
                'artikel' => $artikel[0]
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

    public function search(Request $request)
    {
        // menangkap data pencarian
		$search = $request->search;
        $package = PackageCategoryModel::all();
        $category = CategoryModel::all();

        // mengambil data dari table pegawai sesuai pencarian data
        $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->orWhere('product_name','like',"%".$search."%") 
                    ->orWhere('category_name','like',"%".$search."%") 
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

    public function packageFilter($id)
    {
        $package = PackageCategoryModel::all();
        $category = CategoryModel::all();
        $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->join('tb_product_package', 'tb_product_package.product_id', '=', 'tb_product.product_id')
                    ->join('tb_package_category', 'tb_package_category.package_category_id', '=', 'tb_product_package.package_category_id')
                    ->where('tb_package_category.package_category_id', $id)
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

    public function categoroyProduct($id)
    {
        $package = PackageCategoryModel::all();
        $category = CategoryModel::all();
        $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->where('tb_product.category_id', $id)
                    ->get();
        // dd($product);
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
}
