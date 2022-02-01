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
        'name' => 'オリックス',
        'league' => 'パシフィックリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => 'ロッテ',
        'league' => 'パシフィックリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => '楽天',
        'league' => 'パシフィックリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => 'ソフトバンク',
        'league' => 'パシフィックリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => '日本ハム',
        'league' => 'パシフィックリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => '埼玉西武ライオンズ',
        'league' => 'パシフィックリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => 'ヤクルト',
        'league' => 'セントラルリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => '阪神',
        'league' => 'セントラルリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => '巨人',
        'league' => 'セントラルリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => '広島',
        'league' => 'セントラルリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => '中日',
        'league' => 'セントラルリーグ',
        ]);
        
        DB::table('teams')->insert([
        'name' => 'DeNA',
        'league' => 'セントラルリーグ',
        ]);
    
    }
}
