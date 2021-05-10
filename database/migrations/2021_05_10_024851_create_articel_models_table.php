<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticelModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_articel', function (Blueprint $table) {
            $table->bigIncrements('articel_id');
            $table->string('articel_judul');
            $table->date('articel_tanggal');
            $table->string('articel_penulis');
            $table->text('articel_isi');
            $table->string('articel_gambar');
            $table->string('articel_slug')->nullable();
            $table->integer('articel_viewer')->default(0);
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
        Schema::dropIfExists('tb_articel');
    }
}
