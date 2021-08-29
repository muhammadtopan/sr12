<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Category_o_Product_Package_Model;
use Illuminate\Support\Facades\Validator;

class Category_OPP_Controller extends Controller
{
    public function index()
    {
        $category = Category_o_Product_Package_Model::all();
        $active = 'category_opp';
        return view(
            'backend/page/category_opp/index',
            [
                'category' => $category,
                'active' => $active,
            ]
        );
    }

    public function store(Request $request, Category_o_Product_Package_Model $category)
    {
        if($request->category_opp_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'category_opp_name'           => 'required',
                'category_opp_image'         => 'required|mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('category_opp.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('category_opp_image');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/category_opp/', $filename);

                $category->category_opp_name = $request->input('category_opp_name');
                $category->category_opp_image = $filename;
                $category->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'category_opp_name'          => 'required',
                'category_opp_image'         => 'mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('category_opp.store', $request->category_opp_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('category_opp_image') != null) {
                    $brg_gmb = DB::table('tb_category_o_product_package')
                                ->where('category_opp_id', '=', $request->category_opp_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/category_opp/' . $brg_gmb->category_opp_image);
                    $foto = $request->file('category_opp_image');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/category_opp/', $filename);
                    

                    DB::table('tb_category_o_product_package')
                        ->where('category_opp_id', '=', $request->category_opp_id)
                        ->update([
                            'category_opp_name' => $request->input('category_opp_name'),
                            'category_opp_image' => $filename
                        ]);


                }else{

                    DB::table('tb_category_o_product_package')
                        ->where('category_opp_id', '=', $request->category_opp_id)
                        ->update([
                            'category_opp_name' => $request->input('category_opp_name'),
                        ]);
                }
                return redirect()
                    ->route('category_opp')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(Category_o_Product_Package_Model $category)
    {

        $category_file = $category->category_image;
        if ($category_file != null) {
            unlink('lte/dist/img/category_opp/' . $category_file);
        }
        $category->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_kategori(Request $request)
    {

        $data = DB::table('tb_category_o_product_package')
                ->where('category_opp_id','=',$request->category_opp_id)
                ->first();

        return json_encode($data);
    }
}
