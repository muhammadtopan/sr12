<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_category';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name',
        'category_image',
    ];
}
