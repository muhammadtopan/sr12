<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_gudang', function (Blueprint $table) {
            $table->bigIncrements('id_gudang');
            $table->integer('id_leader');
            $table->string('nama_gudang', 100);
            $table->integer('no_wa');
            $table->string('email', 100);
            $table->string('nik', 100);
            $table->date('tanggal_lahir');
            $table->enum('kelamin', ['L', 'P']);
            $table->integer('kota_id');
            $table->integer('prov_id');
            $table->text('alamat');
            $table->string('photo_toko', 100);
            $table->string('selfi_ktp', 100);
            $table->integer('jumlah_penjualan')->default(0);
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
        Schema::dropIfExists('tb_gudang');
    }
}
