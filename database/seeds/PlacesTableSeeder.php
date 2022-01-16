<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
        'name' => 'メットライフドーム',
        'prefecture' => '埼玉県所沢市',
        'team_id' => 1,
        ]);
        
        DB::table('places')->insert([
        'name' => '東京ドーム',
        'prefecture' => '東京都文京区',
        'team_id' => 2,
        ]);
        
        
    }
}
