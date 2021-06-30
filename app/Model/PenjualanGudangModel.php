<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PenjualanGudangModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_penjualan_gudang';
    protected $primaryKey = 'id_penjualan';
    protected $fillable = [
        'id_leader',
        'id_mitra',
        'product_id',
        'jumlah_product'
    ];
}
