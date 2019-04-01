<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarif_cek_lab extends Model
{
    //
    protected $table = 'tarif_cek_lab';
    protected $fillable = ['nama_cek_lab',
                            'harga',
                            'deskripsi',
                            'id_lab',
                            'status_cek_lab', // 0 tidak bisa dirumah, 1 bisa dirumah 
                            ];

}
