<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StokModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_stok';
    protected $primaryKey = 'stok_id';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_stok',
    ];
}
