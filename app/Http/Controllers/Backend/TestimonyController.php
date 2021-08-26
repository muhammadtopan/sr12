<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Model\TestimonyModel;
use Illuminate\Support\Str;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimony = TestimonyModel::all();
        $active = "testy";
        return view(
            'backend/page/testimony/index',
            [
                'testimony' => $testimony,
                'active' => $active
            ]
        );
    }

    public function store(Request $request, TestimonyModel $testimony)
    {
        if($request->testimony_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'testimony_judul'           => 'required',
                'testimony_gambar'         => 'required|mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('testimony.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('testimony_gambar');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/testimony/', $filename);

                $testimony->testimony_judul = $request->input('testimony_judul');
                $testimony->testimony_category = 'consument';
                $testimony->testimony_slug = Str::slug($request->input('testimony_judul'));
                $testimony->testimony_gambar = $filename;
                $testimony->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'testimony_judul'           => 'required',
                'testimony_gambar'         => 'required|mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('testimony.store', $request->testimony_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('testimony_gambar') != null) {
                    $brg_gmb = DB::table('tb_testimony')
                                ->where('testimony_id', '=', $request->testimony_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/testimony/' . $brg_gmb->testimony_gambar);
                    $foto = $request->file('testimony_gambar');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/testimony/', $filename);
                    

                    DB::table('tb_testimony')
                        ->where('testimony_id', '=', $request->testimony_id)
                        ->update([
                            $testimony->testimony_judul = $request->input('testimony_judul'),
                            $testimony->testimony_slug = Str::slug($request->input('testimony_judul')),
                            $testimony->testimony_gambar = $filename
                        ]);

                }else{

                    DB::table('tb_testimony')
                        ->where('testimony_id', '=', $request->testimony_id)
                        ->update([
                            'testimony_judul' => $request->input('testimony_judul'),
                            'testimony_slug' => Str::slug($request->input('testimony_judul')),
                        ]);
                }
                return redirect()
                    ->route('testimony')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(TestimonyModel $testimony)
    {

        $testimony_file = $testimony->testimony_gambar;
        if ($testimony_file != null) {
            unlink('lte/dist/img/testimony/' . $testimony_file);
        }
        $testimony->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_testimony(Request $request)
    {

        $data = DB::table('tb_testimony')
                ->where('testimony_id','=',$request->testimony_id)
                ->first();

        return json_encode($data);
    }

    public function product(Request $request)
    {
        DB::table('tb_testimony')
            ->where('testimony_id', $request->id)
            ->update(['testimony_category' => 'product']);
        return response()->json([
            'message' => 'Testimoni Product',
        ], 200);
    }

    public function consument(Request $request)
    {
        DB::table('tb_testimony')
            ->where('testimony_id', $request->id)
            ->update(['testimony_category' => 'consument']);
        return response()->json([
            'message' => 'Testimoni Consumen',
        ], 200);
    }
}
