<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageCategoryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_package_category', function (Blueprint $table) {
            $table->bigIncrements('package_category_id');
            $table->string('package_category_name');
            $table->string('package_category_image');
            $table->double('package_category_price');
            $table->text('package_category_step');
            $table->enum('package_category_status',['on', 'off']);
            $table->string('package_category_slug');
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
        Schema::dropIfExists('tb_package_category');
    }
}
