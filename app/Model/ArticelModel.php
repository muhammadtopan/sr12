<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticelModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_article';
    protected $primaryKey = 'article_id';
    protected $fillable = [
        'category_id',
        'article_judul',
        'article_isi',
        'article_slug',
        'article_viewer',
    ];
}
