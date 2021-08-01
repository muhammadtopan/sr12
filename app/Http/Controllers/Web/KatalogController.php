<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\KatalogModel;
use Illuminate\Support\Facades\Validator;
use App\Mail\KatalogMail;
use Illuminate\Support\Facades\Mail;
use DB;

class KatalogController extends Controller
{
    public function download(Request $request, KatalogModel $katalog)
    {
        $messages = [
            'name.required'     => 'Nama wajib diisi!',
            'email.required'    => 'Email harus diisi!',
            'email.email'       => 'Format email tidak sesuai!'
        ];

        $validator = Validator::make($request->all(),[
            'name'  => 'required',
            'email' => 'required|email'
        ], $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else {
            $katalog->name = $request->input('name');
            $katalog->email = $request->input('email');
            $katalog->save();

            $details = [
                'title'=> 'Katalog SR12 Herbal Store',
                'name' => $request->name
            ];
        
            \Mail::to($request->email)->send(new \App\Mail\KatalogMail($details));

            // dd($request->email);

            return redirect()
                ->back() 
                ->with("messages", "Silahkan cek email anda secara berkala");
        }
    }
}
