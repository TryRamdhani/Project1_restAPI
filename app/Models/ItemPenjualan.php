<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPenjualan extends Model
{
    use HasFactory;

    protected $table = 'item_penjualan';
    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = true;

    protected $fillable = ['nota', 'kode_barang', 'qty'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'nota', 'id_nota');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kode_barang', 'kode_barang');
    }
}
