<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_testimony', function (Blueprint $table) {
            $table->bigIncrements('testimony_id');
            $table->string('testimony_judul');
            $table->string('testimony_gambar');
            $table->enum('testimony_category',['product','consument']);
            $table->string('testimony_slug')->nullable();
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
        Schema::dropIfExists('tb_testimony');
    }
}
