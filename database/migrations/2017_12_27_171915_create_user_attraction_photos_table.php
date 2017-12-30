<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAttractionPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_attraction_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('attraction_id')->length(10)->unsigned();
            $table->integer('user_id')->length(10)->unsigned();
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
        Schema::drop('user_attraction_photos');
    }
}
