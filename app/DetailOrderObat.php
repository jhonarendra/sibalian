<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrderObat extends Model
{
    protected $table = 'detail_order_obats';

    protected $fillable = ['id_detil_obat', 'id_order_obat', 'jumlah_obat'];
}
