<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
    protected $primaryKey = 'id_produk';
    public $incrementing = false; // Karena id_produk bertipe string/varchar
    protected $keyType = 'string';
    protected $guarded = [];

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak', 'id_rak');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_produk', 'id_produk');
    }
}
