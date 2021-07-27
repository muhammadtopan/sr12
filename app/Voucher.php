<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        "nama_voucher", "gambar", "jumlah_penukaran", "deskripsi_voucher", "status", "item","jumlah_point"
    ];
}
