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
            'name' => 'ドアラ',
            'email' => 'doara@gmail.com',
            'password' => 'doaradoragons',
            'profile' => 'みなさんはじめまして。ドアラです。',
            
        ]);
        
        DB::table('users') -> insert([
            'name' => 'ジャビット',
            'email' => 'giants@gmail.com',
            'password' => 'giantsgiants',
            'profile' => 'みなさんはじめまして。ジャビットです。',
            
        ]);
    }
}
