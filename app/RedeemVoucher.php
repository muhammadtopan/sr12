<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeemVoucher extends Model
{
    protected $fillable = [
        "id_costumer", "id_voucher", "status"
    ];
}
