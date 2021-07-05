<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananMitraRekap extends Model
{
    protected $fillable = [
        "order_id", "ongkir", "status", "action_code", "total_belanja"
    ];
}
