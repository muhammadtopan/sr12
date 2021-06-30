<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelToTbGudang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_gudang', function (Blueprint $table) {
            $table->enum("level", ["DU", "agen", "sub-agen", "seller"])->after("jumlah_penjualan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_gudang', function (Blueprint $table) {
            //
        });
    }
}
