<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\ArticleCategoryModel;
use DB;

class ArticleCategoryController extends Controller
{
    public function category()
    {
        $artikel = ArticleCategoryModel::all();
        $cat = DB::table('tb_article_category')->first();
        $active = "article_category";
        return view(
            'backend/page/artikel/article_category',
            [
                'artikel' => $artikel,
                'cat' => $cat,
                'active' => $active
            ]
        );
    }
    
    public function store(Request $request, ArticleCategoryModel $category)
    {
        if($request->category_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'category_name' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('article_category.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $category->category_name = $request->input('category_name');
                $category->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'category_name'         => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('article_category.store', $request->category_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {

                DB::table('tb_article_category')
                    ->where('category_id', '=', $request->category_id)
                    ->update([
                        'category_name' => $request->input('category_name'),
                    ]);
                return redirect()
                    ->route('article-category')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(ArticleCategoryModel $category)
    {
        $category->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_category_articel(Request $request)
    {

        $data = DB::table('tb_article_category')
                ->where('category_id','=',$request->category_id)
                ->first();

        return json_encode($data);
    }
}