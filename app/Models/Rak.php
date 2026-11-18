<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $table = 'raks';
    protected $primaryKey = 'id_rak';
    protected $guarded = [];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_rak', 'id_rak');
    }
}
