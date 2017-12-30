<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('zip_code');
            $table->integer('city')->length(10)->unsigned();
            $table->enum('type', ['restauant', 'sights', 'museum', 'tour', 'park','shopping', 'concert', 'nightlife', 'water sport', 'spa&wellness', 'zoo', 'airport', 'casino']);
            $table->integer('rate')->length(2)->unsigned();
            $table->text('description');
            $table->string('opening_hours');
            $table->string('telephone');
            $table->string('website');
            $table->decimal('lng', 10, 10);
            $table->decimal('lat', 10, 10);
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
        Schema::drop('attractions');
    }
}
