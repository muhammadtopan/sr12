<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Model\SyaratModel;

class SyaratController extends Controller
{
    public function index()
    {
        $syarat = SyaratModel::all();
        $active = "faq";
        return view(
            'backend/page/syarat/index',
            [
                'syarat' => $syarat,
                'active' => $active
            ]
        );
    }

    public function store(Request $request, SyaratModel $syarat)
    {
        // dd($syarat->all());
        if($request->syarat_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'syarat_judul'           => 'required',
                'syarat'           => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('syarat.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $syarat->syarat_judul = $request->input('syarat_judul');
                $syarat->syarat = $request->input('syarat');
                $syarat->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'syarat_judul'           => 'required',
                'syarat'           => 'required',
            ]);
            if ($validator->fails()) 
            {
                return redirect()
                    ->route('syarat.store', $request->syarat_id)
                    ->withErrors($validator)
                    ->withInput();
            } 
            else 
            {

                DB::table('tb_syarat')
                    ->where('syarat_id', '=', $request->syarat_id)
                    ->update([
                        'syarat_judul' => $request->input('syarat_judul'),
                        'syarat' => $request->input('syarat'),
                    ]);
                return redirect()
                    ->route('syarat')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(SyaratModel $syarat)
    {
        $syarat->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_syarat(Request $request)
    {

        $data = DB::table('tb_syarat')
                ->where('syarat_id','=',$request->syarat_id)
                ->first();

        return json_encode($data);
    }
}
