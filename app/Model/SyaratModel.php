<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyaratModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_syarat';
    protected $primaryKey = 'syarat_id';
    protected $fillable = [
        'syarat_judul',
        'syarat',
    ];
}
