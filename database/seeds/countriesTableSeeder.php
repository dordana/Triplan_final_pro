<?php

use Illuminate\Database\Seeder;

class countriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Israel',
            'mainpic' => 'israel-main.jpg',
            'continent' => 'Europe',
        ]);
    }
}
