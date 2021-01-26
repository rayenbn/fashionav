<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('sec1_cat_id', 255)->nullable();
            $table->String('banner', 255)->nullable();
            $table->String('sec2_image1', 255)->nullable();
            $table->String('sec2_image2', 255)->nullable();
            $table->String('sec3_cat_id', 255)->nullable();
            $table->String('sec4_cat_id', 255)->nullable();
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
        Schema::dropIfExists('home_pages');
    }
}
