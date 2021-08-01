<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use DB;

class CostumerModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_costumer';
    protected $primaryKey = 'costumer_id';
    protected $fillable = [
        'costumer_name',
        'costumer_email',
        'costumer_phone',
        'costumer_ttl',
        'costumer_gender',
        'prov_id',
        'kota_id',
        'costumer_address',
        'costumer_password',
        'costumer_status',
        'referal',
        'point'
    ];

    public static function GetValidationRule($rule_name)
    {
        return self::$validation_rule[$rule_name];
    }

    public function CheckLoginCostumer($costumer_email, $costumer_password)
    {
        // dd($costumer_password);
        $data_costumer = $this->where("costumer_email", $costumer_email)->get();
        // dd(count($data_costumer) == 1);
        if (count($data_costumer) == 1) {
            if (Hash::check($costumer_password, $data_costumer[0]->costumer_password)) {
                unset($data_costumer[0]->costumer_password);
                return $data_costumer[0];
            }
        }
        return false;
    }
}
