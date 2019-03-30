<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailObat extends Model
{
	protected $table = 'detail_obats';

    protected $fillable = ['id_obat','id_apotek','harga','stok'];
}
