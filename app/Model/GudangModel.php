<?php

namespace App\Model;

use App\PesananMitraRekap;
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
        "level",
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

    public function invited() {
        return $this->hasMany(GudangModel::class, "id_leader");
    }

    public function getMitra() {
        return $this->hasMany(GudangModel::class, "id_leader");
    }

    public function getLeader() {
        return $this->belongsTo(GudangModel::class, "id_leader");
    }

    public function rekap() {
        return $this->hasMany(PesananMitraRekap::class, "id_gudang");
    }

}
