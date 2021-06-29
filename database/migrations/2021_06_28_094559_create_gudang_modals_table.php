<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_gudang', function (Blueprint $table) {
            $table->bigIncrements('gudang_id');
            $table->string('username', 100);
            $table->string('email', 100);
            $table->enum('level', ['du', 'agen', 'sub', 'reseller']);
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_gudang');
    }
}
