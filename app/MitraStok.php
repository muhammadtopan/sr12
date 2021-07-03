<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MitraStok extends Model
{
    protected $fillable = [
        "user_id", "product_stok", "product_id"
    ];
}
