<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriDoktersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_dokters')->insert([
        	'nama_kategori' => 'Umum',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('kategori_dokters')->insert([
        	'nama_kategori' => 'Spesialis Anak',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('kategori_dokters')->insert([
        	'nama_kategori' => 'Spesialis Kandungan',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('kategori_dokters')->insert([
        	'nama_kategori' => 'Spesialis Kulit',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
