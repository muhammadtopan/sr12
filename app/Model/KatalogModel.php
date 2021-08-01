<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class KatalogModel extends Model
{
    use Timestamp;
    protected $table = 'tb_katalog';
    protected $primaryKey = 'katalog_id';
    protected $fillable = [
        'name',
        'email'
    ];
}
