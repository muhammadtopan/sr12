<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_product', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_bpom');
            $table->string('product_image');
            $table->double('product_price');
            $table->integer('product_netto');
            $table->enum('product_unit_netto',['mg','gr','ml','l','butir', 'kapsul']);
            $table->integer('product_weight');
            $table->enum('product_unit',['mg','gr','ml','l']);
            $table->text('product_desk');
            $table->enum('product_status',['on','off']);
            $table->enum('product_usual',['on','off']);
            $table->enum('product_best',['on','off']);
            $table->enum('product_new',['on','off']);
            $table->string('product_slug');
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
        Schema::dropIfExists('tb_product');
    }
}
