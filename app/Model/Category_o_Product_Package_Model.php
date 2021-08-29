<?php

namespace App\Model;    

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_o_Product_Package_Model extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_category_o_product_package';
    protected $primaryKey = 'category_opp_id';
    protected $fillable = [
        'category_opp_name',
        'category_opp_image',
    ];
}
