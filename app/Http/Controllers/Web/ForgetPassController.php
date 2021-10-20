<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\CostumerModel;
use DB;

class ForgetPassController extends Controller
{
    public function forgetPass(Request $request)
    {
        // dd($request->email);
        $user = DB::table('tb_costumer')
                ->where('costumer_email', '=', $request->email)
                ->get();
        $name = $user[0]->costumer_name;
        $id = $user[0]->costumer_id;

        $details = [
            'title'=> 'Katalog SR12 Herbal Store',
            'email' => $request->email,
            'name' => $name,
            'id' => $id
        ];

        \Mail::to($request->email)->send(new \App\Mail\ConfirmationFPAMail($details));

        return redirect()
                ->back() 
                ->with("messages", "Silahkan cek email anda secara berkala");
    }

    public function changePass($email)
    {
        $active = '';
        return view('frontend.auth_user.changePass', [
            'email' => $email,
            'active' => $active
        ]);
    }

    public function upadatePass(Request $request, CostumerModel $costumer)
    {
        // dd(Hash::make($request->input("costumer_password")));    

        $messages = [
            'costumer_password.required'     => 'Password wajib diisi ',
            'costumer_password.min'          => 'Password wajib diisi min 6 karakter',
            'costumer_password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
        ];

        $validator = Validator::make($request->all(), [
            // 'costumer_password'      => 'required|min:6|confirmed'
            'costumer_password'      => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'      => 'required|min:6'
        ], $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user = DB::table('tb_costumer')
                    ->where('costumer_email', $request->costumer_email)
                    ->update(['costumer_password' => Hash::make($request->input("costumer_password"))]);

            return redirect()
                ->route('user.login')
                ->with('pesan', 'Password berhasil diganti, silahkan login');
        }
    }
}
