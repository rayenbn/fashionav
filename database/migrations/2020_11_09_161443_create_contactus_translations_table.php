<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactus_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();
            $table->unsignedBigInteger('contactus_id');
            $table->unique(['contactus_id', 'locale']);
            $table->foreign('contactus_id')->references('id')->on('contactuses')->onDelete('cascade');
            $table->string('title', 190)->nullable();
            $table->longtext('description')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('working_hours', 190)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactus_translations');
    }
}
