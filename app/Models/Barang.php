<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'kode_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kode_barang', 'nama', 'kategori', 'harga'];

    public function item()
    {
        return $this->hasMany(ItemPenjualan::class, 'kode_barang');
    }
}

