<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use DB;

class UserModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'tb_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'user_email',
        'user_phone',
        'user_level',
        'user_password',
        'user_status',
    ];

    public static function GetValidationRule($rule_name)
    {
        return self::$validation_rule[$rule_name];
    }

    public function CheckLoginUser($user_email, $user_password)
    {
        // dd($user_password);
        $data_user = $this->where("user_email", $user_email)->get();
        // dd(count($data_user) == 1);
        if (count($data_user) == 1) {
            if (Hash::check($user_password, $data_user[0]->user_password)) {
                unset($data_user[0]->user_password);
                // $data_user[0]->user_level = "Distributor";
                return $data_user[0];
            }
        }
        return false;
    }
}
