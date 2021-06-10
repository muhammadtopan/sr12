<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_saldo', function (Blueprint $table) {
            $table->bigIncrements('saldo_id');
            $table->integer('user_id');
            $table->string('kredit')->default(0);
            $table->string('debit')->default(0);
            $table->string('saldo')->default(0);
            $table->enum('desc',['income','withdrawal']);
            $table->string('action_code');
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
        Schema::dropIfExists('tb_saldo');
    }
}
