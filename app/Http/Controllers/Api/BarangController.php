<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json(Barang::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barang,kode_barang',
            'nama' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

        $barang = Barang::create($validated);
        return response()->json($barang, 201);
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return response()->json($barang);
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
