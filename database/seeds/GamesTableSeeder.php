<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
        'date' => '2022-4-4-5',
        'time' => '180000',
        'place_id' => 2,
        'team_id1' => 2,
        'team_id2' => 2,
    ]);
    }
}
