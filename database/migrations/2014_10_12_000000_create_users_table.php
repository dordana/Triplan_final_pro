<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provider_id');
            $table->string('provider');
            $table->string('profile_phote_path');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->date('date_of_birth');
            $table->integer('age');
            $table->enum('gender',['male','female']);
            $table->string('country');
            $table->string('city');
            $table->integer('rate');
            $table->boolean('active');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
