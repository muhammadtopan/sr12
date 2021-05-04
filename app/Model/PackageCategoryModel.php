<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageCategoryModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_package_category';
    protected $primaryKey = 'package_category_id';
    protected $fillable = [
        'package_category_name',
        'package_category_image',
        'package_category_price',
        'package_category_step',
        'package_category_status',
        'package_category_slug',
    ];

}
