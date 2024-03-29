<?php

namespace App;

use App\Model\GudangModel;
use App\Model\ProductModel;
use Illuminate\Database\Eloquent\Model;

class PesananMitra extends Model
{
    protected $fillable = [
        "mitra_id", "leader_id", "product_id", "jumlah", "status", "total", "action_code"
    ];

    public function pesananMitraRekap() {
        return $this->belongsTo(PesananMitraRekap::class, "action_code");
    }

    public function product() {
        return $this->belongsTo(ProductModel::class, "product_id");
    }

    public function mitra() {
        return $this->belongsTo(GudangModel::class, "mitra_id");
    }

    public function leader() {
        return $this->belongsTo(GudangModel::class, "leader_id");
    }

}
