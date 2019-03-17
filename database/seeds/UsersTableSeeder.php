<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Hani',
        	'alamat' => 'Jalan Legian Kuta 88x',
        	'telp' => '08273837445',
        	'email' => 'hani@gmail.com',
        	'password' => bcrypt('hani'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
        	'name' => 'Ketut',
        	'alamat' => 'Denpasar Selatan',
        	'telp' => '08734857283',
        	'email' => 'ketut@gmail.com',
        	'password' => bcrypt('ketut'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
        	'name' => 'Lily',
        	'alamat' => 'Kedonganan',
        	'telp' => '08798786526',
        	'email' => 'lily@gmail.com',
        	'password' => bcrypt('lily'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
        	'name' => 'Winda',
        	'alamat' => 'Tabanan',
        	'telp' => '083748572637',
        	'email' => 'winda@gmail.com',
        	'password' => bcrypt('winda'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
