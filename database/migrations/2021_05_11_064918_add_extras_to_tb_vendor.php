<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtrasToTbVendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_vendor', function (Blueprint $table) {
            $table->foreignId("user_id");
            $table->string("nama_lengkap");
            $table->bigInteger("nik")->unsigned();
            $table->date("tgl_lahir");
            $table->string("foto_mitra");
            $table->text("alamat_lengkap");
            $table->integer("prov_id");
            $table->integer("kota_id");
            $table->enum("bank",["BRI","BNI","MANDIRI","BCA"]);
            $table->string("no_rekening");
            $table->string("nama_pemilik_rekening");
            $table->string("selfie_ktp");
            $table->foreign("user_id")->on("tb_user")->references("user_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_vendor', function (Blueprint $table) {
            //
        });
    }
}
