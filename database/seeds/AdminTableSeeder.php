<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'nama' => 'Putu Gede',
        	'alamat' => 'Jalan Bukit Jimbaran',
        	'telp' => '081234567890',
        	'email' => 'putugede@gmail.com',
        	'password' => bcrypt('putugede'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('admins')->insert([
        	'nama' => 'Sutanto',
        	'alamat' => 'Jalan PB Sudirman, Denpasar',
        	'telp' => '08383473647',
        	'email' => 'sutanto@gmail.com',
        	'password' => bcrypt('sutanto'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
	    DB::table('admins')->insert([
        	'nama' => 'Made Dwi',
        	'alamat' => 'Badung',
        	'telp' => '08373848343',
        	'email' => 'madedwi@gmail.com',
        	'password' => bcrypt('madedwi'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        DB::table('admins')->insert([
        	'nama' => 'Eka',
        	'alamat' => 'Buleleng',
        	'telp' => '08278738281',
        	'email' => 'eka@gmail.com',
        	'password' => bcrypt('eka'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        DB::table('admins')->insert([
        	'nama' => 'Komang',
        	'alamat' => 'Jalan By Pass Ngurah Rai',
        	'telp' => '083736363',
        	'email' => 'komang@unud.ac.id',
        	'password' => bcrypt('komang'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
    }
}
