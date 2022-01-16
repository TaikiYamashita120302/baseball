<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Post::class, 3)->create();
        
        
        /*
        DB::table('posts')->insert([
        'body' => '開幕一戦目！',
        'user_id' => 1,
        'game_id' => 1,
    ]);
        DB::table('posts')->insert([
        'body' => '開幕二戦目！',
        'user_id' => 2,
        'game_id' => 2,
    ]);
    */
    }
}
