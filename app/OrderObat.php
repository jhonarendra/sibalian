<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderObat extends Model
{
    protected $table = 'order_obats';

    protected $fillable = ['total', 'id_user', 'status'];
}
