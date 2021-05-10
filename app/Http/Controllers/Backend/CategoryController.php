<?php

namespace App\Http\Controllers\Backend;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\Rule;
    use App\Model\CategoryModel;


class CategoryController extends Controller
{
    public function index()
    {
        $category = CategoryModel::all();
        return view(
            'backend/page/category/index',
            [
                'category' => $category
            ]
        );
    }

    public function store(Request $request, CategoryModel $category)
    {
        if($request->category_id == null){
            // tambah
            $validator = Validator::make($request->all(),[
                'category_name'           => 'required',
                'category_image'         => 'required|mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('category.store')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $foto = $request->file('category_image');
                $filename = time() . "." . $foto->getClientOriginalExtension();
                $foto->move('lte/dist/img/category/', $filename);

                $category->category_name = $request->input('category_name');
                $category->category_image = $filename;
                $category->save();

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil ditambahkan');
            }
        }else{
            // edit
            $validator = Validator::make($request->all(),[
                'category_name'          => 'required',
                'category_image'         => 'mimes:jpg,jpeg,png'
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('category.store', $request->category_id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if ($request->hasFile('category_image') != null) {
                    $brg_gmb = DB::table('tb_category')
                                ->where('category_id', '=', $request->category_id)
                                ->first();
                    // dd($request);
                    unlink('lte/dist/img/category/' . $brg_gmb->category_image);
                    $foto = $request->file('category_image');
                    $filename = time() . "." . $foto->getClientOriginalExtension();
                    $foto->move('lte/dist/img/category/', $filename);
                    

                    DB::table('tb_category')
                        ->where('category_id', '=', $request->category_id)
                        ->update([
                            'category_name' => $request->input('category_name'),
                            'category_image' => $filename
                        ]);

                }else{

                    DB::table('tb_category')
                        ->where('category_id', '=', $request->category_id)
                        ->update([
                            'category_name' => $request->input('category_name'),
                        ]);
                }
                return redirect()
                    ->route('category')
                    ->with('message', 'Data berhasil diperbaiki');
            }
        }

    }

    public function destroy(CategoryModel $category)
    {

        $category_file = $category->category_image;
        if ($category_file != null) {
            unlink('lte/dist/img/category/' . $category_file);
        }
        $category->forceDelete();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus');
    }

    public function cari_data_kategori(Request $request)
    {

        $data = DB::table('tb_category')
                ->where('category_id','=',$request->category_id)
                ->first();

        return json_encode($data);
    }
}

