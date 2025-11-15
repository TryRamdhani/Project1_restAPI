<?php

namespace App\Services;

use App\Models\ItemPenjualan;

class PenjualanService
{
    public function hitungSubtotal($nota)
    {
        $items = ItemPenjualan::where('nota', $nota)->with('barang')->get();

        return $items->sum(fn($item) => $item->qty * $item->barang->harga);
    }
}
