<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        //$this->call(PostsTableSeeder::class);
        //$this->call(GamesTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        //$this->call(Team_PlaceTableSeeder::class);
        
        //App\Team::truncate(); //これはデータベースの中身全削除
    }
}
