<?php

namespace App;

use App\Model\GudangModel;
use Illuminate\Database\Eloquent\Model;

class PesananMitraRekap extends Model
{
    protected $fillable = [
        "id_gudang", "id_leader", "ongkir", "status", "action_code", "total_belanja"
    ];

    public function pesananMitra() {
        return $this->hasMany(PesananMitra::class, "action_code", "action_code");
    }

    public function gudang() {
        return $this->belongsTo(GudangModel::class, "id_gudang");
    }

    public function getRouteKeyName()
    {
        return "action_code";
    }

}
