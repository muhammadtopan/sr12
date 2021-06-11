<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_order';
    protected $primaryKey = 'order_id';
    protected $fillable = [
      "user_id", "costumer_id", "invoice", "proof", "order_address", "kota_id",
      "order_status", "combined_price"
    ];
}
