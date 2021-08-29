<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class UlasanModel extends Model
{
    use Timestamp;
    protected $table = 'tb_ulasan';
    protected $primaryKey = 'ulasan_id';
    protected $fillable = [
        'ulasan',
        'email',
        'ulasan_status'
    ];
}
