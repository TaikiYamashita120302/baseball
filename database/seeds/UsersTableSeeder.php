<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('users') -> insert([
            'name' => 'レオ',
            'email' => 'reo@gmail.com',
            'password' => 'reoreolions',
            'profile' => 'みなさんはじめまして。レオです。',
            
        ]);
        
        */
        
        DB::table('users') -> insert([
            'name' => '管理者',
            'email' => 'kanrisya@gmail.com',
            'password' => 'kanrisya',
            'role' => '100',
            
        ]);
        
    }
}
