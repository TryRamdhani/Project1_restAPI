<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return response()->json(Penjualan::with(['pelanggan', 'itemPenjualan.barang'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl' => 'required|date',
            'kode_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'subtotal' => 'required|numeric',
        ]);

        $penjualan = Penjualan::create($validated);
        return response()->json($penjualan, 201);
    }

    public function show($id)
    {
        $penjualan = Penjualan::with(['pelanggan', 'itemPenjualan.barang'])->findOrFail($id);
        return response()->json($penjualan);
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($request->all());
        return response()->json($penjualan);
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
