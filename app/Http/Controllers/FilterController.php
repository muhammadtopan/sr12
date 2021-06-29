<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FilterController extends Controller
{
    public function filterKategori(Request $request) {
        $data = [];
        $filter = $request->filter;
        $min = $request->min;
        $max = $request->max;

        if($request->filter == null && $request->min == null && $request->max == null) {
            foreach ($request->data as $id) {
                $product = DB::table('tb_product')
                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                ->select('tb_product.*', 'tb_category.category_name')
                ->where("tb_product.category_id", (int)$id)
                ->get();
                $data [] = $product;
            }
        } else if($request->filter !== null && $request->min === null && $request->max == null) {
            $sort = $request->filter;
            if($sort === "acak") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->inRandomOrder()
                    ->get();
                    $data [] = $product;
                }
            } else if($sort === "harga-terendah") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->orderBy("product_price", "ASC")
                    ->get();
                    $data [] = $product;
                }
            } else if($sort === "harga-tertinggi") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->orderBy("product_price", "DESC")
                    ->get();
                    $data [] = $product;
                }
            } else if($sort === "product-terbaru") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->orderBy("created_at", "DESC")
                    ->get();
                    $data [] = $product;
                }
            } else if($sort === "best-seller") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->where("product_type", "best")
                    ->get();
                    $data [] = $product;
                }
            }
        } else if($request->filter === null && $request->min !== null && $request->max !== null) {
            foreach ($request->data as $id) {
                $product = DB::table('tb_product')
                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                ->select('tb_product.*', 'tb_category.category_name')
                ->where("tb_product.category_id", (int)$id)
                ->whereBetween("product_price", [$min, $max])
                ->get();
                $data [] = $product;
            }
        } else if($request->filter !== null && $request->min !== null && $request->max !== null) {
            if($filter === "acak") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->inRandomOrder()
                    ->whereBetween("product_price", [$min,$max])
                    ->get();
                    $data [] = $product;
                }
            } else if($filter === "harga-terendah") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->orderBy("product_price", "ASC")
                    ->whereBetween("product_price", [$min,$max])
                    ->get();
                    $data [] = $product;
                }
            } else if($filter === "harga-tertinggi") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->orderBy("product_price", "DESC")
                    ->whereBetween("product_price", [$min,$max])
                    ->get();
                    $data [] = $product;
                }
            } else if($filter === "product-terbaru") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->orderBy("created_at", "DESC")
                    ->whereBetween("product_price", [$min,$max])
                    ->get();
                    $data [] = $product;
                }
            } else if($filter === "best-seller") {
                foreach ($request->data as $id) {
                    $product = DB::table('tb_product')
                    ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                    ->select('tb_product.*', 'tb_category.category_name')
                    ->where("tb_product.category_id", (int)$id)
                    ->where("product_type", "best")
                    ->whereBetween("product_price", [$min,$max])
                    ->get();
                    $data [] = $product;
                }
            }
        }
        return response()->json($data);
    }

    public function filterSorting(Request $request) {
        $sort = $request->sort;
        $product = DB::table('tb_product')
        ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
        ->select('tb_product.*', 'tb_category.category_name');
        if($sort === "acak") {
            return response()->json($product->inRandomOrder()->get());
        } else if($sort === "harga-terendah") {
            return response()->json($product->orderBy("product_price", "ASC")->get());
        } else if($sort === "harga-tertinggi") {
           return response()->json($product->orderBy("product_price", "DESC")->get());
        } else if($sort === "product_terbaru") {
            return response()->json($product->orderBy("product_id", "DESC")->get());
        } else if($sort === "best-seller") {
            return response()->json($product->where("product_type", "best")->get());
        }
    }

    public function filterHarga(Request $request) {
        $min = $request->min;
        $max = $request->max;
        $listId = $request->listId;
        $filter = $request->filter;

        if($listId !== null) {
            foreach ($listId as $id) {
                $product = DB::table('tb_product')
                ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
                ->select('tb_product.*', 'tb_category.category_name')
                ->where("tb_product.category_id", (int)$id)
                ->whereBetween("product_price", [$min,$max])
                ->get();
                $data [] = $product;
            }
            return $data;
        } else {
            return $product = DB::table('tb_product')
            ->join('tb_category', 'tb_category.category_id', '=', 'tb_product.category_id')
            ->select('tb_product.*', 'tb_category.category_name')
            ->whereBetween("product_price", [$min,$max])
            ->get();
        }

    }
}
