<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Model\ArticelModel;
use App\Model\ArticleCategoryModel;
use Illuminate\Support\Str;


class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = ArticelModel::all();
        $article = ArticelModel::first();
        $categories = ArticleCategoryModel::all();
        $active = "article";

        return view(
            'backend/page/artikel/index',
            [
                'artikel' => $artikel,
                'article' => $article,
                'categories' => $categories,
                'active' => $active
            ]
        );
    }

    public function store(Request $request, ArticelModel $artikel)
    {
        if($request->article_id == null){
            // tambah
            // dd($request);
            $validator = Validator::make($request->all(),[
                'category_id'           => 'required',
                'article_judul'           => 'required',
                'article_isi'           => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('article.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $artikel->category_id = $request->input('category_id');
                $artikel->article_judul = $request->input('article_judul');
                $artikel->article_isi = $request->input('article_isi');
                $artikel->article_slug = Str::slug($request->input('article_judul'));
                $artikel->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'category_id'         => 'required',
                'article_judul'         => 'required',
                'article_isi'           => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('article.store', $request->article_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {

                    DB::table('tb_article')
                        ->where('article_id', '=', $request->article_id)
                        ->update([
                            'category_id' => $request->input('category_id'),
                            'article_judul' => $request->input('article_judul'),
                            'article_isi' => $request->input('article_isi'),
                            'article_slug' => Str::slug($request->input('article_judul')),
                        ]);
                return redirect()
                    ->route('article')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(ArticelModel $article)
    {
        $articel_file = $article->article_gambar;
        if ($articel_file != null) {
            unlink('lte/dist/img/articel/' . $articel_file);
        }
        $article->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_articel(Request $request)
    {
        $data = DB::table('tb_article')
                ->where('article_id','=',$request->article_id)
                ->first();
        return json_encode($data);
    }
}