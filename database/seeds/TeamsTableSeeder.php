<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
        'name' => '埼玉西武ライオンズ',
        'league' => 'パシフィックリーグ',
    ]);
        DB::table('teams')->insert([
        'name' => '読売ジャイアンツ',
        'league' => 'セントラルリーグ',
    ]);
    }
}
