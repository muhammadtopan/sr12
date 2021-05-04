<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
// use App\Model\VendorModel;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function index()
    {
        // $vendor = VendorModel::all();
        return view(
            'backend/page/vendor/index',
            // [
            //     'vendor' => $vendor
            // ]
        );
    }

    public function store(Request $request, VendorModel $vendor)
    {
        if($request->vendor_id == null){
            // dd($request);
            // tambah
            $validator = Validator::make($request->all(),[
                'category_id'           => 'required',
                'vendor_name'           => 'required',
                'vendor_bpom'           => 'required|numeric',
                'vendor_netto'           => 'required|numeric',
                'vendor_weight'           => 'required|numeric',
                'vendor_unit'           => 'required',
                'vendor_image'         => 'mimes:jpg,jpeg,png',
                'vendor_price'           => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('vendor.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('vendor_image');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/vendor/', $filename);

                $vendor->category_id = $request->input('category_id');
                $vendor->vendor_name = $request->input('vendor_name');
                $vendor->vendor_bpom = $request->input('vendor_bpom');
                $vendor->vendor_netto = $request->input('vendor_netto');
                $vendor->vendor_weight = $request->input('vendor_weight');
                $vendor->vendor_unit = $request->input('vendor_unit');
                $vendor->vendor_desk = $request->input('vendor_desk');
                $vendor->vendor_price = $request->input('vendor_price');
                $vendor->vendor_status = 'off'; 
                $vendor->vendor_slug = $request->input('vendor_name');
                $vendor->vendor_image = $filename;
                $vendor->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'category_id'           => 'required',
                'vendor_name'           => 'required',
                'vendor_bpom'           => 'required|numeric',
                'vendor_netto'           => 'required|numeric',
                'vendor_weight'           => 'required|numeric',
                'vendor_unit'           => 'required',
                'vendor_image'         => 'mimes:jpg,jpeg,png',
                'vendor_price'           => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('vendor.store', $request->vendor_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('vendor_image') != null) {
                    $brg_gmb = DB::table('tb_vendor')
                                ->where('vendor_id', '=', $request->vendor_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/vendor/' . $brg_gmb->vendor_image);
                    $foto = $request->file('vendor_image');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/vendor/', $filename);

                    DB::table('tb_vendor')
                        ->where('vendor_id', '=', $request->vendor_id)
                        ->update([
                            'category_id' => $request->input('category_id'),
                            'vendor_name' => $request->input('vendor_name'),
                            'vendor_bpom' => $request->input('vendor_bpom'),
                            'vendor_netto' => $request->input('vendor_netto'),
                            'vendor_weight' => $request->input('vendor_weight'),
                            'vendor_unit' => $request->input('vendor_unit'),
                            'vendor_desk' => $request->input('vendor_desk'),
                            'vendor_price' => $request->input('vendor_price'),
                            'vendor_slug' => $request->input('vendor_name'),
                            'vendor_image' => $filename,
                        ]);

                }else{
                    DB::table('tb_vendor')
                        ->where('vendor_id', '=', $request->vendor_id)
                        ->update([
                            'category_id' => $request->input('category_id'),
                            'vendor_name' => $request->input('vendor_name'),
                            'vendor_bpom' => $request->input('vendor_bpom'),
                            'vendor_netto' => $request->input('vendor_netto'),
                            'vendor_weight' => $request->input('vendor_weight'),
                            'vendor_unit' => $request->input('vendor_unit'),
                            'vendor_desk' => $request->input('vendor_desk'),
                            'vendor_price' => $request->input('vendor_price'),
                            'vendor_slug' => $request->input('vendor_name'),
                        ]);
                }
                return redirect()
                    ->route('vendor')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(VendorModel $vendor)
    {

        $vendor_file = $vendor->vendor_image;
        if ($vendor_file != null) {
            unlink('lte/dist/img/vendor/' . $vendor_file);
        }
        $vendor->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_vendor(Request $request)
    {

        $data = DB::table('tb_vendor')
                ->where('vendor_id','=',$request->vendor_id)
                ->first();

        return json_encode($data);
    }

    public function active(Request $request)
    {
        DB::table('tb_vendor')
            ->where('vendor_id', $request->id)
            ->update(['vendor_status' => 'on']);
        return response()->json([
            'message' => 'PRODUK TELAH AKTIF',
        ], 200);
    }
    public function non_active(Request $request)
    {
        DB::table('tb_vendor')
            ->where('vendor_id', $request->id)
            ->update(['vendor_status' => 'off']);
        return response()->json([
            'message' => 'PRODUK TELAH DI NONAKTIFKAN',
        ], 200);
    }
}
