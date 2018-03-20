<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->length(10)->unsigned();
            $table->integer('num_of_likes')->length(10)->unsigned();
            $table->string('title');
            $table->text('body');
            $table->integer('attraction_id')->length(10)->unsigned();
            $table->integer('country_id')->length(10)->unsigned();
            $table->integer('city_id')->length(10)->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('questions');
    }
}
