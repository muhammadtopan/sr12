<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananMitrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_mitras', function (Blueprint $table) {
            $table->id();
            $table->integer("mitra_id");
            $table->integer("leader_id");
            $table->integer("product_id");
            $table->integer("jumlah");
            $table->enum("status", ["wait", "pack", "sent", "accepted", "reject"]);
            $table->integer("total");
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
        Schema::dropIfExists('pesanan_mitras');
    }
}
