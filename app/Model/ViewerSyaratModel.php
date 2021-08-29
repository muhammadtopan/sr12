<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;

class ViewerSyaratModel extends Model
{
    use Timestamp;
    protected $table = 'tb_viewer_syarat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_viewer',
        'phone',
        'view'
    ];
}
