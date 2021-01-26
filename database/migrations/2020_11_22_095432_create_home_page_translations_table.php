<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomePageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();
            $table->unsignedBigInteger('home_page_id');
            $table->unique(['home_page_id', 'locale']);
            $table->foreign('home_page_id')->references('id')->on('home_pages')->onDelete('cascade');

            $table->String('sec1_title', 255)->nullable();
            $table->string('sec2_title1')->nullable();
            $table->String('sec2_subtitle1', 255)->nullable();
            $table->string('sec2_title2')->nullable();
            $table->String('sec2_subtitle2', 255)->nullable();
            $table->String('sec3_title', 255)->nullable();
            $table->String('sec4_title', 255)->nullable();
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
        Schema::dropIfExists('home_page_translations');
    }
}
