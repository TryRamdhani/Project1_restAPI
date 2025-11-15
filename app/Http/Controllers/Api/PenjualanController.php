<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\ItemPenjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return Penjualan::with('pelanggan')->get();
    }

    public function show($id)
    {
        $p = Penjualan::with(['pelanggan', 'items.barang'])->findOrFail($id);
        return $p;
    }

    public function store(Request $r)
    {
        $r->validate([
            'id_nota' => 'required|string',
            'tgl' => 'required|date',
            'kode_pelanggan' => 'required|string',
        ]);

        $penjualan = Penjualan::create([
            'id_nota' => $r->id_nota,
            'tgl' => $r->tgl,
            'kode_pelanggan' => $r->kode_pelanggan,
            'subtotal' => 0,
        ]);

        return response()->json($penjualan, 201);
    }

    public function update(Request $r, $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $penjualan->update([
            'tgl' => $r->tgl,
            'kode_pelanggan' => $r->kode_pelanggan,
        ]);

        return $penjualan;
    }

    public function destroy($id)
    {
        Penjualan::destroy($id);
        ItemPenjualan::where('nota', $id)->delete();

        return response()->json(["message" => "deleted"]);
    }

    public static function updateSubtotal($nota)
    {
        $items = ItemPenjualan::where('nota', $nota)->get();
        $subtotal = 0;

        foreach ($items as $i) {
            $barang = Barang::find($i->kode_barang);
            $subtotal += ($barang->harga * $i->qty);
        }

        Penjualan::where('id_nota', $nota)->update([
            'subtotal' => $subtotal
        ]);
    }
}
