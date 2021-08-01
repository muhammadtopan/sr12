<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class ArticleCategoryModel extends Model
{
    use Timestamp;
    protected $table = 'tb_article_category';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name'
    ];
}
