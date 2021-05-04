<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPackageModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_product_package';
    protected $primaryKey = 'product_package_id';
    protected $fillable = [
        'package_category_id',
        'product_id',
    ];
}
