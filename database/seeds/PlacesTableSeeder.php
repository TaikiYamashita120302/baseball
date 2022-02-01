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
        'name' => '京セラドーム',
        'prefecture' => '大阪府大阪市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'ZOZOマリンスタジアム',
        'prefecture' => '千葉県千葉市',
        ]);
        
        DB::table('places')->insert([
        'name' => '楽天生命パーク宮城',
        'prefecture' => '宮城県仙台市',
        ]);
        
        DB::table('places')->insert([
        'name' => '福岡PayPayドーム',
        'prefecture' => '福岡県福岡市',
        ]);
        
        DB::table('places')->insert([
        'name' => '札幌ドーム',
        'prefecture' => '北海道札幌市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'ベルーナドーム',
        'prefecture' => '埼玉県所沢市',
        ]);
        
        DB::table('places')->insert([
        'name' => '明治神宮野球場',
        'prefecture' => '東京都新宿区',
        ]);
        
        DB::table('places')->insert([
        'name' => '阪神甲子園球場',
        'prefecture' => '兵庫県西宮市',
        ]);
        
        DB::table('places')->insert([
        'name' => '東京ドーム',
        'prefecture' => '東京都文京区',
        ]);
        
        DB::table('places')->insert([
        'name' => 'マツダスタジアム',
        'prefecture' => '広島県広島市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'バンテリンドーム',
        'prefecture' => '愛知県名古屋市',
        ]);
        
        DB::table('places')->insert([
        'name' => '横浜スタジアム',
        'prefecture' => '神奈川県横浜市',
        ]);
        
        #パの地方球場・順位順
        
        DB::table('places')->insert([
        'name' => 'ほっともっとフィールド神戸',
        'prefecture' => '兵庫県神戸市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'はるか夢球場',
        'prefecture' => '青森県弘前市',
        ]);
        
        DB::table('places')->insert([
        'name' => '岩手県営球場',
        'prefecture' => '岩手県盛岡市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'こまちスタジアム',
        'prefecture' => '秋田県秋田市',
        ]);
        
        DB::table('places')->insert([
        'name' => '北九州市民球場',
        'prefecture' => '福岡県北九州市',
        ]);
        
        DB::table('places')->insert([
        'name' => '長崎ビックNスタジアム',
        'prefecture' => '長崎県長崎市',
        ]);
        
        DB::table('places')->insert([
        'name' => '平和リース球場',
        'prefecture' => '鹿児島県鹿児島市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'ひなたサンマリンスタジアム宮崎',
        'prefecture' => '宮崎県宮崎市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'スタルヒン球場',
        'prefecture' => '北海道旭川市',
        ]);
        
        DB::table('places')->insert([
        'name' => '帯広の森野球場',
        'prefecture' => '北海道帯広市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'ウインドヒルひがし北海道スタジアム',
        'prefecture' => '北海道釧路市',
        ]);
        
        DB::table('places')->insert([
        'name' => '静岡草薙球場',
        'prefecture' => '静岡県静岡市',
        ]);
        
        DB::table('places')->insert([
        'name' => '埼玉県営大宮球場',
        'prefecture' => '埼玉県さいたま市',
        ]);
        
        DB::table('places')->insert([
        'name' => '沖縄セルラースタジアム那覇',
        'prefecture' => '沖縄県那覇市',
        ]);
        
        #セの地方球場・順位順
        
        DB::table('places')->insert([
        'name' => '松山中央公園（坊っちゃんスタジアム）',
        'prefecture' => '愛媛県松山市',
        ]);
        
        DB::table('places')->insert([
        'name' => '荘内銀行・日新製薬スタジアム山形',
        'prefecture' => '山形県東村山郡',
        ]);
        
        DB::table('places')->insert([
        'name' => 'ヨーク開成山スタジアム',
        'prefecture' => '福島県郡山市',
        ]);
        
        DB::table('places')->insert([
        'name' => '宇都宮清原野球場',
        'prefecture' => '栃木県宇都宮市',
        ]);
        
        DB::table('places')->insert([
        'name' => '豊橋市民球場',
        'prefecture' => '愛知県豊橋市',
        ]);
        
        DB::table('places')->insert([
        'name' => 'HARD OFF ECOスタジアム新潟',
        'prefecture' => '新潟県新潟市',
        ]);
        
        
    }
}
