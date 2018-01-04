<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->integer('country_id')->length(10)->unsigned();
            $table->integer('population')->length(10)->unsigned();
            $table->integer('num_of_airports')->length(3)->unsigned();
            $table->integer('num_of_attractions')->length(3)->unsigned();
            $table->string('neighbers');
            $table->string('mainpic');
            $table->string('wiki_link');
            $table->integer('num_of_clicks')->length(3)->unsigned();
            $table->decimal('lng', 10, 10);
            $table->decimal('lat', 10, 10);
            $table->text('description');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cities');
    }
}
