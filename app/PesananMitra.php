<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananMitra extends Model
{
    protected $fillable = [
        "mitra_id", "leader_id", "product_id", "jumlah", "status", "total", "action_code"
    ];
}
