<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraModelsTable extends Migration
{
    public function up()
    {
        Schema::create('tb_mitra', function (Blueprint $table) {
            $table->bigIncrements('mitra_id');
            $table->string('mitra_name');
            $table->string('mitra_phone');
            $table->string('mitra_email');
            $table->string('ktp_number');
            $table->date('mitra_ttl');
            $table->enum('mitra_gender',['LK','PR']);
            $table->integer('prov_id');
            $table->integer('kota_id');
            $table->string('mitra_address');
            $table->string('mitra_password');
            $table->string('name', 100)->nullable()->default('text');
            $table->string('selfie_ktp')->nullable();   
            $table->enum('mitra_position',['m','r', 's', 'a']);
            $table->enum('mitra_status',['on','off']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_mitra');
    }
}
