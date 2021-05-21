<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Referal extends Model
{
    protected $fillable = ["user_id", "referal", "pendapatan"];
}
