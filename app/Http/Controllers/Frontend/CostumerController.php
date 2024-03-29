<?php

namespace App\Http\Controllers\Frontend;

use App\Voucher;
use Carbon\Carbon;
use App\Model\Referal;
use App\RedeemVoucher;
use App\Helper\JwtHelper;
use App\Model\ProductModel;
use App\Model\CostumerModel;
use Illuminate\Http\Request;
use App\Model\TmpDetailsModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CostumerController extends Controller
{
    public function index()
    {
        $prov = DB::table('tb_provinsi')->get();
        $active = "masuk";
        return view('frontend/auth_user/login',
        [
        'active' => $active,
        'prov' => $prov
        ]);
    }

    public function register()
    {
        $prov = DB::table('tb_provinsi')->get();
        $prov2 = DB::table('tb_provinsi')->get();
        $active = "regis";
        $tap = "akun";
        return view('frontend/auth_user/register',
        [
        'active' => $active,
        'tap' => $tap,
        'prov' => $prov,
        'prov2' => $prov2
        ]);
    }

    public function mitraMegister()
    {
        $prov = DB::table('tb_provinsi')->get();
        $prov2 = DB::table('tb_provinsi')->get();
        $active = "regis";
        $tap = "mitra";
        return view('frontend/auth_user/register',
        [
        'active' => $active,
        'tap' => $tap,
        'prov' => $prov,
        'prov2' => $prov2
        ]);
    }

    public function registerAdmin(Request $request, CostumerModel $costumer)
    {
        $request->validate([
            "costumer_name" => ["required", "unique:tb_costumer,costumer_name"],
            "costumer_email" => ["required", "email", "unique:tb_costumer,costumer_email"],
            "costumer_phone" => ["required", "numeric"],
            "costumer_password" => ["required", "confirmed"],
            "costumer_password_confirmation" => ["required"]
        ]);
            $data = $request->all();
            $data['costumer_name'] = ucwords(strtolower($request->input('costumer_name')));
            $data['costumer_email'] = strtolower($request->input('costumer_email'));
            $data['costumer_password'] = Hash::make($request->input("costumer_password"));
            $data['referal_code'] = $request->referal;
            $data['costumer_status'] = "on";
            $costumer = CostumerModel::create($data);
            return redirect()
                ->route('user.login')
                ->with('message', 'Akun Berhasil Dibuat');
    }

    public function loginAdmin(Request $request, CostumerModel $costumer)
    {

        // cek data login
        // $admin = new CostumerModel();
        $data_costumer = $costumer->CheckLoginCostumer($request->input("costumer_email"), $request->input("costumer_password"));
        // dd($data_costumer);
        if ($data_costumer)
        {
            $token = JwtHelper::BuatToken($data_costumer);

            // masukan data login ke session
            $request->session()->put('costumer_id', $data_costumer->costumer_id);
            $request->session()->put('costumer_name', $data_costumer->costumer_name);
            $request->session()->put('point', $data_costumer->point);
            $request->session()->put('tokenUser', $token);
            $total_price = TmpDetailsModel::where("user_id", $data_costumer->costumer_id)->sum('total_price');
            $request->session()->put('total_price', $total_price);

            // dd($request->session());

            // redirect ke halaman home
            return redirect()
                    ->route('home')
                    ->with("pesan", "Selamat datang " . session('costumer_name'));
        }
        else
        {
            return back()->with("pesan", "Email atau Password Salah");
        }
    }



    function logout(Request $request)
    {
        $request->session()->flush();
        // $request->session()->forget('user_id');
        // $request->session()->forget('username');
        // $request->session()->forget('user_email');
        // $request->session()->forget('user_level');
        // $request->session()->forget('token_vendor');
        // redirect ke halaman home
        return redirect('home')->with("pesan", "Anda Sudah Logout");
    }

    public function profile()
    {
        $active = "akun";
        $akun = DB::table('tb_costumer')
                    ->join('tb_provinsi', 'tb_provinsi.prov_id', '=', 'tb_costumer.prov_id')
                    ->join('tb_kota', 'tb_kota.kota_id', '=', 'tb_costumer.kota_id')
                    ->select('tb_costumer.*', 'tb_provinsi.prov_nama', 'tb_kota.kota_nama')
                    ->first();
        return view('frontend/costumer/profile',
        [
            'akun' => $akun,
            'active' => $active,
        ]);
    }

    public function carikota(Request $request)
    {
        $kota = DB::table('tb_kota')
            ->where('prov_id', '=', $request->prov_id)
            ->get();
        // dd($kota);
        return response()->json([
            'kota' => $kota,
        ], 200);
    }

    public function CheckReferal(Request $request) {
        $referal = $request->referal;
        $freelancer = Referal::where("referal",$referal)->first();
        return isset($freelancer->referal)
        ? response()->json(["status" => "ok"],200)
        : response()->json(["status" => "failed"],200);
    }

    public function GetDashboardKeranjang(Request $request) {
        $cart = TmpDetailsModel::where("user_id", Session::get("costumer_id"))->get()->groupBy(function($data) {
            return $data->created_at->format("d-M-Y");
        });
        $data['active'] = "keranjang";
        $data['data'] = $cart;
        return view("frontend.costumer.profile-component.list_cart", $data);
    }

    public function GetDashboardKeranjangDetail($tgl) {
        $detail = [];
        $data = ProductModel::where("tb_tmp_details.user_id", Session::get("costumer_id"))
        ->join("tb_tmp_details", "tb_tmp_details.product_id","tb_product.product_id",)
        ->get();
        foreach ($data as $d) {
            if($d->created_at->format("d-M-Y") == $tgl) {
                $detail[] = $d;
            }
        }
        $data['active'] = "";
        $data['data'] = $detail;
        return view("frontend.costumer.profile-component.detail_cart", $data);
    }

    public function GetListVoucher() {
        $vouchers = Voucher::where("status", "aktif")->get();
        $data["active"] = "voucher";
        $data['vouchers'] = $vouchers;
        return view("frontend.costumer.profile-component.list_voucher", $data);
    }

    public function RedeemVoucher(Voucher $v) {
       // cek point user
       $user = DB::table("tb_costumer")->where("costumer_id", Session::get("costumer_id"))->first();

        if($user->point < $v->jumlah_point) {
            return redirect()->back()->with("pesan", "Point Kamu Tidak Cukup");
        } else {
            RedeemVoucher::create([
                "id_costumer" => $user->costumer_id,
                "id_voucher" => $v->id
            ]);
            $v->update([
                "jumlah_penukaran" => $v->jumlah_penukaran + 1
            ]);
            DB::table("tb_costumer")->where("costumer_id",$user->costumer_id)->update([
                "point" => $user->point - $v->point
            ]);
            return redirect()->back()->with("pesan", "Penukaran Point Berhasil");
        }
    }

    public function HistoryVoucher() {
        $vouchers = RedeemVoucher::join("tb_costumer", "redeem_vouchers.id_costumer", "=", "tb_costumer.costumer_id")
        ->join("vouchers", "redeem_vouchers.id_voucher", "=", "vouchers.id")
        ->where("id_costumer", Session::get("costumer_id"))
        ->get(["redeem_vouchers.id","vouchers.nama_voucher", "redeem_vouchers.status","vouchers.item","vouchers.jumlah_point","redeem_vouchers.created_at"]);

        $data["active"] = "voucher";
        $data["vouchers"] = $vouchers;
        return view("frontend.costumer.profile-component.list_history_voucher", $data);
    }

    public function HistoryBayar() {
        $history = DB::table("tb_order")
        ->join("tb_vendor", "tb_vendor.user_id", "tb_order.user_id")
        ->join("tb_kota", "tb_kota.kota_id", "tb_order.kota_id")
        ->join("tb_bank", "tb_order.bank_id", "tb_bank.bank_id")
        ->where("costumer_id", Session::get("costumer_id"))
        ->where("order_status", "!=", "waiting")
        ->where("order_status", "!=", "rejected")
        ->get(["tb_order.order_id", "tb_vendor.nama_lengkap", "tb_bank.bank_name", "tb_order.invoice", "tb_order.noresi", "tb_order.combined_price"]);

        $data["active"] = "bayar";
        $data["history"] = $history;
        return view("frontend.costumer.profile-component.history-paid-shop", $data);
    }

    public function HistoryBayarDetail($order) {
        $order_detail = $history = DB::table("tb_order")
        ->join("tb_order_details", "tb_order_details.order_id", "tb_order.order_id")
        ->join("tb_product", "tb_product.product_id", "tb_order_details.product_id")
        ->join("tb_bank", "tb_order.bank_id", "tb_bank.bank_id")
        ->where("tb_order_details.order_id", $order)
        ->get(["tb_order.order_id", "tb_bank.bank_name", "tb_order.invoice", "tb_order.noresi", "tb_order.combined_price", "tb_product.product_name", "tb_order_details.quantity", "tb_order_details.capital_price", "tb_order_details.total_price"]);
        $data["active"] = "bayar";
        $data["detail"] = $order_detail;
        return view("frontend.costumer.profile-component.history-paid-shop-detail", $data);
    }

    public function BarangSampai()
    {
        $completed = DB::table("tb_order")
                ->join("tb_vendor", "tb_vendor.user_id", "tb_order.user_id")
                ->join("tb_kota", "tb_kota.kota_id", "tb_order.kota_id")
                ->join("tb_bank", "tb_order.bank_id", "tb_bank.bank_id")
                ->where("costumer_id", Session::get("costumer_id"))
                ->where("order_status", "=", "end")
                ->orWhere("order_status", "=", "sent")
                // ->get(["tb_order.order_id", "tb_vendor.nama_lengkap", "tb_bank.bank_name", "tb_order.invoice", "tb_order.noresi", "tb_order.combined_price"]);
                ->get();

        $data["active"] = "completed";
        $data["completed"] = $completed;
        return view("frontend.costumer.dashboard.transaction-completed", $data);
    }

    public function BarangSampaiDetail($order)
    {
        $completed_detail = DB::table("tb_order")
            ->join("tb_order_details", "tb_order_details.order_id", "tb_order.order_id")
            ->join("tb_product", "tb_product.product_id", "tb_order_details.product_id")
            ->join("tb_bank", "tb_order.bank_id", "tb_bank.bank_id")
            ->where("tb_order_details.order_id", $order)
            ->get(["tb_order.order_id", "tb_bank.bank_name", "tb_order.invoice", "tb_order.noresi", "tb_order.combined_price", "tb_product.product_name", "tb_order_details.quantity", "tb_order_details.capital_price", "tb_order_details.total_price"]);
        $data["active"] = "completed";
        $data["detail"] = $completed_detail;
        return view("frontend.costumer.dashboard.transaction-completed-detail", $data);
    }

    public function PackageArrived(Request $request)
    {
        DB::table('tb_order')
            ->where('order_id', $request->order_id)
            ->update(['order_status' => 'end']);
        return redirect()->back();
    }

}