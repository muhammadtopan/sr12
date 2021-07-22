<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use DB;

class MitraModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_mitra';
    protected $primaryKey = 'mitra_id';
    protected $fillable = [
        'mitra_name', 
        'mitra_phone',
        'mitra_email',
        'ktp_number',
        'mitra_ttl',
        'mitra_gender',
        'prov_id',
        'kota_id',
        'mitra_address',
        'selfie_ktp',
        'mitra_position',
        'mitra_password',
        'mitra_status',
    ];

    public static function GetValidationRule($rule_name)
    {
        return self::$validation_rule[$rule_name];
    }

    public function CheckLoginMitra($mitra_email, $mitra_password)
    {
        // dd($mitra_password);
        $data_mitra = $this->where("mitra_email", $mitra_email)->get();
        // dd(count($data_mitra) == 1);
        if (count($data_mitra) == 1) {
            if (Hash::check($mitra_password, $data_mitra[0]->mitra_password)) {
                unset($data_mitra[0]->mitra_password);
                return $data_mitra[0];
            }
        }
        return false;
    }
}
