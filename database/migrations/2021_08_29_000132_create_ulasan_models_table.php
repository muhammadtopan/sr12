<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ulasan', function (Blueprint $table) {
            $table->bigIncrements('ulasan_id');
            $table->text('ulasan');
            $table->string('email');
            $table->enum('ulasan_status', ['on', 'off']);
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
        Schema::dropIfExists('tb_ulasan');
    }
}
