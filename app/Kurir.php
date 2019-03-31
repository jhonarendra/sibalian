<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    protected $table = 'kurirs';

    protected $fillable = ['nama','alamat','telp'];
}
