<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('username');
            $table->string('user_email');
            $table->string('user_phone');
            $table->enum('user_level',['Distributor', 'Agen', 'Sub-Agen', 'Freelance']);
            $table->string('user_password');
            $table->enum('user_status',['on','off']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_user');
    }
}
