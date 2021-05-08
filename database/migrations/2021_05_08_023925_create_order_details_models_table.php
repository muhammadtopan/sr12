<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_details', function (Blueprint $table) {
            $table->bigIncrements('order_details_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->tinyInteger('dicount')->default(0);
            $table->tinyInteger('quantity');
            $table->integer('capital_price');
            $table->integer('selling_price');
            $table->integer('total_price');
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
        Schema::dropIfExists('tb_order_details');
    }
}
