<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetailsModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_order_details';
    protected $primaryKey = 'order_details_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'dicount',
        'quantity',
        'capital_price',
        'selling_price',
        'total_price',];
}
