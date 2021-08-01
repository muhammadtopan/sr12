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
        Schema::create('tb_article', function (Blueprint $table) {
            $table->bigIncrements('article_id');
            $table->integer('category_id');
            $table->string('article_judul');
            $table->text('article_isi');
            $table->string('article_slug')->nullable();
            $table->integer('article_viewer')->default(0);
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
