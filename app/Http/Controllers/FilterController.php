<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function filterKategori(Request $request) {
        $data = [
            'product' => null,
            'package' => null,
        ];
        $filter = $request->filter;
        $min = $request->min;
        $max = $request->max;

        if($request->filter === null && $request->min == null && $request->max == null) {
            foreach ($request->data as $id) {
                $product = DB::table('tb_product')
                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                        ->select('tb_product.*', 'tb_category.category_name')
                        ->where("tb_product.category_id", (int)$id)
                        ->get();
                $data['product'] = $product;
            }
        } else if($request->filter !== null && $request->min === null && $request->max == null) {
            $sort = $request->filter;
            if($sort === "acak") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->inRandomOrder()
                                    ->get();
                        $data['product'][] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->inRandomOrder()
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($sort === "harga-terendah") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->where("tb_product.category_id", (int)$id)
                                ->orderBy("product_price", "ASC")
                                ->get();
                        $data['product'][] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.package_category_price", "ASC")
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($sort === "harga-tertinggi") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->orderBy("product_price", "DESC")
                                    ->get();
                        $data['product'][] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.package_category_price", "DESC")
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($sort === "product_terbaru") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->orderBy("created_at", "DESC")
                                    ->get();
                        $data['product'][] = $product; 
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->orderBy("tb_package_category.created_at", "DESC")
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($sort === "best-seller") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->where("product_best", "on")
                                    ->get();
                        $data ['product'][] = $product;
                    }
                }
            }
        } else if($request->filter === null && $request->min !== null && $request->max !== null) {
            foreach ($request->data as $id) {
                if($id < 1000){
                    $product = DB::table('tb_product')
                            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                            ->select('tb_product.*', 'tb_category.category_name')
                            ->where("tb_product.category_id", (int)$id)
                            ->whereBetween("product_price", [$min, $max])
                            ->get();
                    $data['product'] = $product;
                }else{
                    $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->get();
                        $data['package'][] = $package;
                }
            }
        } else if($request->filter !== null && $request->min !== null && $request->max !== null) {
            if($filter === "acak") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->where("tb_product.category_id", (int)$id)
                                ->inRandomOrder()
                                ->whereBetween("product_price", [$min,$max])
                                ->get();
                        $data['product'][] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->inRandomOrder()
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($filter === "harga-terendah") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                        ->select('tb_product.*', 'tb_category.category_name')
                        ->where("tb_product.category_id", (int)$id)
                        ->orderBy("product_price", "ASC")
                        ->whereBetween("product_price", [$min,$max])
                        ->get();
                        $data['product'][] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.package_category_price", "ASC")
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($filter === "harga-tertinggi") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                        ->select('tb_product.*', 'tb_category.category_name')
                        ->where("tb_product.category_id", (int)$id)
                        ->orderBy("product_price", "DESC")
                        ->whereBetween("product_price", [$min,$max])
                        ->get();
                        $data['product'][] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.package_category_price", "DESC")
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($filter === "product_terbaru") {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->orderBy("created_at", "DESC")
                                    ->whereBetween("product_price", [$min,$max])
                                    ->get();
                        $data['product'][] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.created_at", "DESC")
                                    ->get();
                        $data['package'][] = $package;
                    }
                }
            } else if($filter === "best-seller") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->where("tb_product.category_id", (int)$id)
                                ->where("product_best", "on")
                                ->whereBetween("product_price", [$min,$max])
                                ->get();
                    $data['product'][] = $product;
                }
            }
        }
        return response()->json($data);
    }

    public function filterSorting(Request $request)
    {
        $data = [
            'product' => null,
            'package' => null,
        ];
        $filter = $request->filter;
        $min = $request->min;
        $max = $request->max;
        if($request->data == null){
            $product = DB::table('tb_product')
                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                        ->select('tb_product.*', 'tb_category.category_name');
            $packageshow  = DB::table('tb_package_category')
                            ->join('tb_category_o_product_package', 'tb_package_category.category_opp_id', '=', 'tb_category_o_product_package.category_opp_id');
            if($filter === "acak") {
                return response()->json([
                    'product' => $product->inRandomOrder()->get(),
                    'package' => $packageshow->inRandomOrder()->get(),
                ]);
            } else if($filter === "harga-terendah") {
                return response()->json([
                    'product' => $product->orderBy("product_price", "ASC")->get(),
                    'package' => $packageshow->orderBy("package_category_price", "ASC")->get(),
                ]);
            } else if($filter === "harga-tertinggi") {
                return response()->json([
                    'product' => $product->orderBy("product_price", "DESC")->get(),
                    'package' => $packageshow->orderBy("package_category_price", "DESC")->get(),
                ]);
            } else if($filter === "product_terbaru") {
                return response()->json([
                    'product' => $product->orderBy("product_id", "DESC")->get(),
                    'package' => $packageshow->orderBy("package_category_id", "DESC")->get(),
                ]);
            } else if($filter === "best-seller") {
                return response()->json([
                    'product' => $product->where("product_best", "on")->get(),
                    'package'=> null
                ]);
            }
        }else{
            if($request->filter === null && $request->min == null && $request->max == null) {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                            ->select('tb_product.*', 'tb_category.category_name')
                            ->where("tb_product.category_id", (int)$id)
                            ->get();
                    $data['product'] = $product;
                }
            } else if($request->filter !== null && $request->min === null && $request->max == null) {
                $sort = $request->filter;
                if($sort === "acak") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->inRandomOrder()
                                        ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->inRandomOrder()
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "harga-terendah") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->orderBy("product_price", "ASC")
                                    ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "ASC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "harga-tertinggi") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->orderBy("product_price", "DESC")
                                        ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "product_terbaru") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->orderBy("created_at", "DESC")
                                        ->get();
                            $data['product'][] = $product; 
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->orderBy("tb_package_category.created_at", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "best-seller") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->where("product_best", "on")
                                        ->get();
                            $data ['product'][] = $product;
                        }
                    }
                }
            } else if($request->filter === null && $request->min !== null && $request->max !== null) {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->where("tb_product.category_id", (int)$id)
                                ->whereBetween("product_price", [$min, $max])
                                ->get();
                        $data['product'] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->get();
                            $data['package'][] = $package;
                    }
                }
            } else if($request->filter !== null && $request->min !== null && $request->max !== null) {
                if($filter === "acak") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->inRandomOrder()
                                    ->whereBetween("product_price", [$min,$max])
                                    ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->inRandomOrder()
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($filter === "harga-terendah") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                            ->select('tb_product.*', 'tb_category.category_name')
                            ->where("tb_product.category_id", (int)$id)
                            ->orderBy("product_price", "ASC")
                            ->whereBetween("product_price", [$min,$max])
                            ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "ASC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }

                    // $result = [];
                    // for ($i=0; $i < count($data['product']); $i++) { 
                    //     for ($j=0; $j < count($data['product'][$i]); $j++) { 
                    //         array_push($result, $data['product'][$i][$j]);
                    //     }
                    // }
                    // $collection = collect($result);
                    // $sorted = $collection->sortBy('product_price');
                    // $sorted->values()->all();
                    // $data['product'] = $sorted;
                    

                } else if($filter === "harga-tertinggi") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                            ->select('tb_product.*', 'tb_category.category_name')
                            ->where("tb_product.category_id", (int)$id)
                            ->orderBy("product_price", "DESC")
                            ->whereBetween("product_price", [$min,$max])
                            ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($filter === "product_terbaru") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->orderBy("created_at", "DESC")
                                        ->whereBetween("product_price", [$min,$max])
                                        ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.created_at", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($filter === "best-seller") {
                    foreach ($request->data as $id) {
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->where("product_best", "on")
                                    ->whereBetween("product_price", [$min,$max])
                                    ->get();
                        $data['product'][] = $product;
                    }
                }
            }
            return response()->json($data);
        }

    }

    public function filterHarga(Request $request)
    {
        $data = [
            'product' => null,
            'package' => null,
        ];
        $filter = $request->filter;
        $min = $request->min;
        $max = $request->max;
        if($request->data == null && $request->min == null && $request->max == null){
            $product = DB::table('tb_product')
                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                        ->select('tb_product.*', 'tb_category.category_name');
            $packageshow  = DB::table('tb_package_category')
                            ->join('tb_category_o_product_package', 'tb_package_category.category_opp_id', '=', 'tb_category_o_product_package.category_opp_id');
            if($filter === "acak") {
                return response()->json([
                    'product' => $product->inRandomOrder()->get(),
                    'package' => $packageshow->inRandomOrder()->get(),
                ]);
            } else if($filter === "harga-terendah") {
                return response()->json([
                    'product' => $product->orderBy("product_price", "ASC")->get(),
                    'package' => $packageshow->orderBy("package_category_price", "ASC")->get(),
                ]);
            } else if($filter === "harga-tertinggi") {
                return response()->json([
                    'product' => $product->orderBy("product_price", "DESC")->get(),
                    'package' => $packageshow->orderBy("package_category_price", "DESC")->get(),
                ]);
            } else if($filter === "product_terbaru") {
                return response()->json([
                    'product' => $product->orderBy("product_id", "DESC")->get(),
                    'package' => $packageshow->orderBy("package_category_id", "DESC")->get(),
                ]);
            } else if($filter === "best-seller") {
                return response()->json([
                    'product' => $product->where("product_best", "on")->get(),
                    'package'=> null
                ]);
            }
        }elseif($request->data == null && $request->min != null && $request != null){
            if($filter === "acak") {
                        $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->inRandomOrder()
                                ->whereBetween("product_price", [$min,$max])
                                ->get();
                        $data['product'][] = $product;
                    
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->inRandomOrder()
                                    ->get();
                        $data['package'][] = $package;
            } else if($filter === "harga-terendah") {
                        $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->orderBy("product_price", "ASC")
                                        ->whereBetween("product_price", [$min,$max])
                                        ->get();
                        $data['product'][] = $product;
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.package_category_price", "ASC")
                                    ->get();
                        $data['package'][] = $package;
            } else if($filter === "harga-tertinggi") {
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->orderBy("product_price", "DESC")
                                    ->whereBetween("product_price", [$min,$max])
                                    ->get();
                        $data['product'][] = $product;
                
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.package_category_price", "DESC")
                                    ->get();
                        $data['package'][] = $package;
            } else if($filter === "product_terbaru") {
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->orderBy("created_at", "DESC")
                                    ->whereBetween("product_price", [$min,$max])
                                    ->get();
                        $data['product'][] = $product;
                    
                        $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.created_at", "DESC")
                                    ->get();
                        $data['package'][] = $package;
                    
                
            } else if($filter === "best-seller") {
                    $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->where("product_best", "on")
                                ->whereBetween("product_price", [$min,$max])
                                ->get();
                    $data['product'][] = $product;
            }
            return response()->json($data);
        }else{
            if($request->filter === null && $request->min == null && $request->max == null) {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                            ->select('tb_product.*', 'tb_category.category_name')
                            ->where("tb_product.category_id", (int)$id)
                            ->get();
                    $data['product'] = $product;
                }
            } else if($request->filter !== null && $request->min === null && $request->max == null) {
                $sort = $request->filter;
                if($sort === "acak") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->inRandomOrder()
                                        ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->inRandomOrder()
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "harga-terendah") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->orderBy("product_price", "ASC")
                                    ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "ASC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "harga-tertinggi") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->orderBy("product_price", "DESC")
                                        ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "product_terbaru") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->orderBy("created_at", "DESC")
                                        ->get();
                            $data['product'][] = $product; 
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->orderBy("tb_package_category.created_at", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($sort === "best-seller") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->where("product_best", "on")
                                        ->get();
                            $data ['product'][] = $product;
                        }
                    }
                }
            } else if($request->filter === null && $request->min !== null && $request->max !== null) {
                foreach ($request->data as $id) {
                    if($id < 1000){
                        $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->where("tb_product.category_id", (int)$id)
                                ->whereBetween("product_price", [$min, $max])
                                ->get();
                        $data['product'] = $product;
                    }else{
                        $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->get();
                            $data['package'][] = $package;
                    }
                }
            } else if($request->filter !== null && $request->min !== null && $request->max !== null) {
                if($filter === "acak") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->inRandomOrder()
                                    ->whereBetween("product_price", [$min,$max])
                                    ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->inRandomOrder()
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($filter === "harga-terendah") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                            ->select('tb_product.*', 'tb_category.category_name')
                            ->where("tb_product.category_id", (int)$id)
                            ->orderBy("product_price", "ASC")
                            ->whereBetween("product_price", [$min,$max])
                            ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "ASC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($filter === "harga-tertinggi") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                            ->select('tb_product.*', 'tb_category.category_name')
                            ->where("tb_product.category_id", (int)$id)
                            ->orderBy("product_price", "DESC")
                            ->whereBetween("product_price", [$min,$max])
                            ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.package_category_price", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($filter === "product_terbaru") {
                    foreach ($request->data as $id) {
                        if($id < 1000){
                            $product = DB::table('tb_product')
                                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                        ->select('tb_product.*', 'tb_category.category_name')
                                        ->where("tb_product.category_id", (int)$id)
                                        ->orderBy("created_at", "DESC")
                                        ->whereBetween("product_price", [$min,$max])
                                        ->get();
                            $data['product'][] = $product;
                        }else{
                            $package = DB::table('tb_package_category')
                                        ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                        ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                        ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                        ->orderBy("tb_package_category.created_at", "DESC")
                                        ->get();
                            $data['package'][] = $package;
                        }
                    }
                } else if($filter === "best-seller") {
                    foreach ($request->data as $id) {
                        $product = DB::table('tb_product')
                                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                    ->select('tb_product.*', 'tb_category.category_name')
                                    ->where("tb_product.category_id", (int)$id)
                                    ->where("product_best", "on")
                                    ->whereBetween("product_price", [$min,$max])
                                    ->get();
                        $data['product'][] = $product;
                    }
                }
            }
            return response()->json($data);
        }
    }


    public function filterSortingBAck(Request $request) {
        $sort = $request->sort;
        $product = DB::table('tb_product')
                        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                        ->select('tb_product.*', 'tb_category.category_name');
        $packageshow  = DB::table('tb_package_category')
                        ->join('tb_category_o_product_package', 'tb_package_category.category_opp_id', '=', 'tb_category_o_product_package.category_opp_id');
        if($sort === "acak") {
            return response()->json([
                'product' => $product->inRandomOrder()->get(),
                'package' => $packageshow->inRandomOrder()->get(),
            ]);
        } else if($sort === "harga-terendah") {
            return response()->json([
                'product' => $product->orderBy("product_price", "ASC")->get(),
                'package' => $packageshow->orderBy("package_category_price", "ASC")->get(),
            ]);
        } else if($sort === "harga-tertinggi") {
            return response()->json([
                'product' => $product->orderBy("product_price", "DESC")->get(),
                'package' => $packageshow->orderBy("package_category_price", "DESC")->get(),
            ]);
        } else if($sort === "product_terbaru") {
            return response()->json([
                'product' => $product->orderBy("product_id", "DESC")->get(),
                'package' => $packageshow->orderBy("package_category_id", "DESC")->get(),
            ]);
        } else if($sort === "best-seller") {
            return response()->json([
                'product' => $product->where("product_best", "on")->get(),
                'package'=> null
            ]);
        }
    }

    public function filterHarga1(Request $request) {
        $min = $request->min;
        $max = $request->max;
        $listId = $request->listId;
        $filter = $request->filter;
        $data = [
            'product' => null,
            'package' => null,
        ];

        if($listId !== null) {
            foreach ($listId as $id) {
                if($id < 1000){
                    $product = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->where("tb_product.category_id", (int)$id)
                                ->whereBetween("product_price", [$min,$max])
                                ->get();
                    $data['product'] = $product;
                }else{
                    $package = DB::table('tb_package_category')
                                    ->join('tb_category_o_product_package', 'tb_category_o_product_package.category_opp_id', '=', 'tb_package_category.category_opp_id')
                                    ->where('tb_package_category.category_opp_id', ((int)$id) - 1000)
                                    ->whereBetween("tb_package_category.package_category_price", [$min,$max])
                                    ->orderBy("tb_package_category.created_at", "DESC")
                                    ->get();
                    $data['package'] = $package;
                }
            }
            return $data;
        } else {
            $data['product'] = DB::table('tb_product')
                                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                                ->select('tb_product.*', 'tb_category.category_name')
                                ->whereBetween("product_price", [$min,$max])
                                ->get();
            return $data;
        }

    }
}
