<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriDokter extends Model
{
    public $table = "kategori_dokters";

    public function dokter(){
    	return $this->hasMany('App\Dokter');
    }
}
