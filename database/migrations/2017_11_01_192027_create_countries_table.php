<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('code', 3)->unique();
            $table->enum('continent', ['Asia', 'Europe', 'North America', 'Africa', 'Oceania', 'Antarctica', 'South America']);
            $table->integer('capital')->length(10)->unsigned();
            $table->string('language');
            $table->string('currency');
            $table->decimal('gdp', 10, 2);
            $table->integer('population')->length(10)->unsigned();
            $table->decimal('surface_area', 10, 2);
            $table->decimal('life_exp', 3, 1);
            $table->integer('num_of_airports')->length(3)->unsigned();
            $table->string('calling_code', 10);
            $table->integer('num_of_cities')->length(3)->unsigned();
            $table->string('neighbers');
            $table->string('mainpic');
            $table->integer('num_of_clicks')->length(3)->unsigned();
            $table->string('wiki_link');
            $table->string('lng');
            $table->string('lat');
            $table->string('head_of_state');
            $table->date('indep_date');
            $table->string('flag_pic');
            $table->string('religion');
            $table->text('description');
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
        Schema::drop('countries');
    }
}
