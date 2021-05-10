<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Model\ArticelModel;
use Illuminate\Support\Str;


class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = ArticelModel::all();
        return view(
            'backend/page/artikel/index',
            [
                'artikel' => $artikel
            ]
        );
    }

    public function store(Request $request, ArticelModel $artikel)
    {
        if($request->articel_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'articel_judul'           => 'required',
                'articel_tanggal'           => 'required',
                'articel_penulis'           => 'required',
                'articel_isi'           => 'required',
                'articel_gambar'         => 'required|mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('articel.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('articel_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/articel/', $filename);

                $artikel->articel_judul = $request->input('articel_judul');
                $artikel->articel_tanggal = $request->input('articel_tanggal');
                $artikel->articel_penulis = $request->input('articel_penulis');
                $artikel->articel_isi = $request->input('articel_isi');
                $artikel->articel_slug = Str::slug($request->input('articel_judul'));
                $artikel->articel_gambar = $filename;
                $artikel->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'articel_judul'           => 'required',
                'articel_tanggal'           => 'required',
                'articel_penulis'           => 'required',
                'articel_isi'           => 'required',
                'articel_gambar'         => 'required|mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('articel.store', $request->articel_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('articel_gambar') != null) {
                    $brg_gmb = DB::table('tb_articel')
                                ->where('articel_id', '=', $request->articel_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/articel/' . $brg_gmb->articel_gambar);
                    $foto = $request->file('articel_gambar');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/articel/', $filename);
                    

                    DB::table('tb_articel')
                        ->where('articel_id', '=', $request->articel_id)
                        ->update([
                            $artikel->articel_judul = $request->input('articel_judul'),
                            $artikel->articel_tanggal = $request->input('articel_tanggal'),
                            $artikel->articel_penulis = $request->input('ararticel_penulis'),
                            $artikel->articel_isi = $request->input('articel_isi'),
                            $artikel->articel_slug = Str::slug($request->input('articel_judul')),
                            $artikel->articel_gambar = $filename
                        ]);

                }else{

                    DB::table('tb_articel')
                        ->where('articel_id', '=', $request->articel_id)
                        ->update([
                            'articel_judul' => $request->input('articel_judul'),
                            'articel_tanggal' => $request->input('articel_tanggal'),
                            'articel_penulis' => $request->input('articel_penulis'),
                            'articel_isi' => $request->input('articel_isi'),
                            'articel_slug' => Str::slug($request->input('articel_judul')),
                        ]);
                }
                return redirect()
                    ->route('articel')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(ArticelModel $artikel)
    {

        $artikel_file = $artikel->articel_gambar;
        if ($artikel_file != null) {
            unlink('lte/dist/img/articel/' . $artikel_file);
        }
        $artikel->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_articel(Request $request)
    {

        $data = DB::table('tb_articel')
                ->where('articel_id','=',$request->articel_id)
                ->first();

        return json_encode($data);
    }
}