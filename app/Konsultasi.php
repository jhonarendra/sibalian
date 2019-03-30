<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $fillable = ['id_dokter','biaya_konsultasi','id_user','tgl_mulai','tgl_selesai','status'];
}
