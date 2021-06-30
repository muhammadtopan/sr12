<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanGudangModelsTable extends Migration
{
    public function up()
    {
        Schema::create('tb_penjualan_gudang', function (Blueprint $table) {
            $table->bigIncrements('id_penjualan');
            $table->integer('id_leader');
            $table->integer('id_mitra');
            $table->integer('product_id');
            $table->integer('jumlah_product');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_penjualan_gudang');
    }
}
