<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeem_vouchers', function (Blueprint $table) {
            $table->id();
            $table->integer("id_voucher");
            $table->integer("id_costumer");
            $table->enum("status", ["konfirmasi", "belum konfirmasi"])->default("belum konfirmasi");
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
        Schema::dropIfExists('redeem_vouchers');
    }
}
