<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GudangModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_gudang';
    protected $primaryKey = 'id_gudang';
    protected $fillable = [
        'id_leader',
        'nama_gudang',
        'no_wa',
        'email',
        'nik', 100,
        'tanggal_lahir',
        'kelamin',
        'kota_id',
        'prov_id',
        'alamat',
        'photo_toko',
        'selfi_ktp',
        'jumlah_penjualan',
        "password"
    ];
}
