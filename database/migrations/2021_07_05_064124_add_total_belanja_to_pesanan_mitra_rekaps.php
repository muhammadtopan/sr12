<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalBelanjaToPesananMitraRekaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanan_mitra_rekaps', function (Blueprint $table) {
            $table->integer("total_belanja")->after("ongkir");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan_mitra_rekaps', function (Blueprint $table) {
            //
        });
    }
}
