<?php

namespace App\Http\Controllers\Backend;

use App\Voucher;
use App\RedeemVoucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class VoucherController extends Controller
{
    public function index() {
        $data['voucher'] = Voucher::get();
        $data['active'] = 'voucher';
        return view("backend.page.voucher.index", $data);
    }

    public function PostVoucher(Request $request) {
        $request->validate([
            "nama_voucher" => ["required"],
            "foto" => ["required"],
            "item" => ["required"],
            "deskripsi_voucher" => ["required"],
            "jumlah_point" => ["required", "gt:0"],
        ]);
        $data = Voucher::create([
            "nama_voucher" => $request->nama_voucher,
            "gambar" => $request->file("foto")->store("voucher"),
            "item" => $request->item,
            "jumlah_penukaran" => 0,
            "deskripsi_voucher" => $request->deskripsi_voucher,
            "jumlah_point" => $request->jumlah_point
        ]);
        return redirect()->back();
    }

    public function DeleteVoucher(Voucher $v) {
        Storage::delete($v->gambar);
        $v->delete();
        return redirect()->back();
    }

    public function GetEditVoucher(Voucher $v) {
        return view("backend.page.voucher.edit-voucher",compact("v"));
    }


    public function PutVoucherStatus(Request $request, Voucher $v) {
        $request->validate(["status" => ["required"]]);
        $v->update([
            "status" => $request->status
        ]);
        return redirect()->back();
    }

    public function PutVoucherGambar(Request $request, Voucher $v) {
        $request->validate([
            "foto" => ["required", "mimes:jpg,bmp,png"]
        ]);
        Storage::delete($v->gambar);
        $updated = $v->update([
            "gambar" => $request->file("foto")->store("voucher")
        ]);
        return redirect()->back();
    }

    public function PutEditVoucer(Request $request, Voucher $v) {
        $v->update([
            "nama_voucher" => $request->nama_voucher,
            "item" => $request->item,
            "deskripsi_voucher" => $request->deskripsi_voucher,
            "jumlah_point" => $request->jumlah_point
        ]);
        return redirect()->back();
    }

    public function GetDetailVoucher(Request $request) {
        $voucher = Voucher::where("id", $request->id)->first();
        return response()->json($voucher,200);
    }

    public function GetVoucherRedeem() {
        $data['redeem'] = RedeemVoucher::join("tb_costumer", "redeem_vouchers.id_costumer", "=", "tb_costumer.costumer_id")
        ->join("vouchers", "redeem_vouchers.id_voucher", "=", "vouchers.id")
        ->get(["tb_costumer.costumer_name","redeem_vouchers.id","vouchers.nama_voucher", "redeem_vouchers.status","vouchers.item","vouchers.jumlah_point","redeem_vouchers.created_at"]);
        // ->get(["tb_costumer.costumer.name","redeem_vouchers.id","vouchers.nama_voucher", "redeem_vouchers.status","vouchers.item","vouchers.jumlah_point","redeem_vouchers.created_at"]);
        $data['active'] = 'reedem';
        return view("backend.page.voucher.redeem", $data);
    }

    public function VoucherRedeemKonfirmasi(RedeemVoucher $r) {
        $pesan = $r->status == "konfirmasi" ? "Konfirmasi Berhasil Dibatalkan" : "Penukaran Voucher Telah Disetujui";
        $r->update([
            "status" => $r->status == "konfirmasi" ? "belum konfirmasi" : "konfirmasi"
        ]);
        return redirect()->back()->with("pesan", $pesan);
    }

}
