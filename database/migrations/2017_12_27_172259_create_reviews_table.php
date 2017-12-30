<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('rate')->length(2)->unsigned();
            $table->enum('type_of_visit', ['couple', 'family', 'friends', 'business', 'solo']);
            $table->date('date_of_visit');
            $table->integer('attraction_id')->length(10)->unsigned();
            $table->enum('type', ['review', 'recommendation']);
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
        Schema::drop('reviews');
    }
}
