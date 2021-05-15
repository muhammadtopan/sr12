<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostumerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_costumer', function (Blueprint $table) {
            $table->bigIncrements('costumer_id');
            $table->string('costumer_name');
            $table->string('costumer_email');
            $table->string('costumer_phone');
            $table->date('costumer_ttl');
            $table->enum('costumer_gender',['LK','PR']);
            $table->integer('prov_id');
            $table->integer('kota_id');
            $table->string('costumer_address');
            $table->string('costumer_password');
            $table->enum('costumer_status',['on','off']);
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
        Schema::dropIfExists('tb_costumer');
    }
}
