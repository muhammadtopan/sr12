<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestimonyModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_testimony';
    protected $primaryKey = 'testimony_id';
    protected $fillable = [
        'testimony_judul',
        'testimony_gambar',
        'testimony_category',
        'testimony_slug',
    ];
}
