<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminModel extends Model
{
    use SoftDeletes;
    protected $table = "tb_admin";
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
        'admin_phone',
        'admin_level',
    ];

    public static function GetValidationRule($rule_name)
    {
        return self::$validation_rule[$rule_name];
    }

    public function CheckLoginAdmin($email, $password)
    {
        $data_admin = $this->where("admin_email", $email)->get();
        // dd(count($data_admin) == 1);
        if (count($data_admin) == 1) {
            if (Hash::check($password, $data_admin[0]->admin_password)) {
                unset($data_admin[0]->password);
                $data_admin[0]->level = "admin";
                return $data_admin[0];
            }
        }
        return false;
    }
}
