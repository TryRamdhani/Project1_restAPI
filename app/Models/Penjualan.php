<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_nota';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_nota', 'tgl', 'kode_pelanggan', 'subtotal'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'kode_pelanggan');
    }

    public function items()
    {
        return $this->hasMany(ItemPenjualan::class, 'nota');
    }
}

