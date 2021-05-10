<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticelModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_articel';
    protected $primaryKey = 'articel_id';
    protected $fillable = [
        'articel_judul',
        'articel_tanggal',
        'articel_penulis',
        'articel_isi',
        'articel_gambar',
        'articel_slug',
        'articel_viewer',
    ];
}
