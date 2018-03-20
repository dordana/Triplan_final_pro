<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'user_id' => 1,
            'body' => 'test1',
            'country_id' => 1,
        ]);
    }
}
