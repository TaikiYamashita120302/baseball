<?php

use Illuminate\Database\Seeder;

class Team_PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
     //tableとplaceの中間テーブルシーダー
    public function run()
    {
        //メイン球場
        
        DB::table('team_place')->insert([
        'team_id' => '1',
        'place_id' => '1',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '2',
        'place_id' => '2',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '3',
        'place_id' => '3',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '4',
        'place_id' => '4',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '5',
        'place_id' => '5',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '6',
        'place_id' => '6',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '7',
        'place_id' => '7',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '8',
        'place_id' => '8',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '9',
        'place_id' => '9',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '10',
        'place_id' => '10',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '11',
        'place_id' => '11',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '12',
        'place_id' => '12',
        ]);
        
        //ここから地方球場
        //パ・リーグ
        
        DB::table('team_place')->insert([
        'team_id' => '1',
        'place_id' => '13',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '3',
        'place_id' => '14',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '3',
        'place_id' => '15',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '3',
        'place_id' => '16',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '4',
        'place_id' => '17',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '4',
        'place_id' => '18',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '4',
        'place_id' => '19',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '4',
        'place_id' => '20',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '5',
        'place_id' => '21',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '5',
        'place_id' => '22',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '5',
        'place_id' => '23',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '5',
        'place_id' => '24',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '6',
        'place_id' => '25',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '6',
        'place_id' => '26',
        ]);
        
        //セ・リーグ
        
        DB::table('team_place')->insert([
        'team_id' => '7',
        'place_id' => '27',
        ]);
        DB::table('team_place')->insert([
        'team_id' => '9',
        'place_id' => '28',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '9',
        'place_id' => '29',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '9',
        'place_id' => '30',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '11',
        'place_id' => '31',
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '12',
        'place_id' => '32',
        ]);
        
        //地方球場の複数球団の本拠地
        //パ・リーグ
        
        DB::table('team_place')->insert([
        'team_id' => '4',
        'place_id' => '9',//ソフトバンク・東京ドーム
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '4',
        'place_id' => '1',//ソフトバンク・京セラドーム
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '5',
        'place_id' => '9',//日ハム・東京ドーム
        ]);
        
        //セ・リーグ
        
        DB::table('team_place')->insert([
        'team_id' => '8',
        'place_id' => '1',//阪神・京セラドーム
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '9',
        'place_id' => '1',//巨人・京セラドーム
        ]);
        
        DB::table('team_place')->insert([
        'team_id' => '9',
        'place_id' => '26',//巨人・那覇
        ]);
        
    }
}
