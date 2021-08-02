<?php

use App\AdminModel;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminModel::create([
            'admin_name' => "admin",
            'admin_email' => "admin@gmail.com",
            'admin_password' => bcrypt(123),
            'admin_phone' => "081212341234",
            'admin_level' => "admin",
        ]);
    }
}
