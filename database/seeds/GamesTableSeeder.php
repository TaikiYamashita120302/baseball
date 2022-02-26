<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('games')->insert([
        'date' => '2022-3-25',
        'time' => '160000',
        'place_id' => 3,
        'team_id1' => 3,
        'team_id2' => 2,
    ]);
    }
}
