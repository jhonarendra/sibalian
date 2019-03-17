<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apotek extends Model
{
	protected $fillable = ['nama_apotek','alamat','telp','email'];
}
