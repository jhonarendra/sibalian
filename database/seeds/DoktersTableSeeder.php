<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoktersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokters')->insert([
        	'nama_dokter' => 'Dr. Ketut Gede',
            'ttl_dokter' => 'Bangli, 3 Januari 1998',
            'telp' => '0893893893',
            'alamat' => 'Bangli',
            'id_kategori' => '1',
            'email' => 'ketutgede@gmail.com'
        	'password' => bcrypt('ketutgede'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('dokters')->insert([
            'nama_dokter' => 'Dr. Gunawan',
            'ttl_dokter' => 'Jimbaran, 10 Desember 1987',
            'telp' => '0982982989',
            'alamat' => 'Jimbaran',
            'id_kategori' => '2',
            'email' => 'gunawan@gmail.com'
            'password' => bcrypt('gunawan'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('dokters')->insert([
            'nama_dokter' => 'Dr. Putra',
            'ttl_dokter' => 'Jembrana, 17 April 1990',
            'telp' => '08765637489',
            'alamat' => 'Jembrana',
            'id_kategori' => '3',
            'email' => 'putra@gmail.com'
            'password' => bcrypt('putra'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
