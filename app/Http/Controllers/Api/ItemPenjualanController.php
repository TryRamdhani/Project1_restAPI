<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Services\PenjualanService;
use Illuminate\Http\Request;

class ItemPenjualanController extends Controller
{
    public function index()
    {
        return response()->json(ItemPenjualan::with(['barang', 'penjualan'])->get());
    }

    // public function store(Request $request)
    // {
    //     \Log::info('ItemPenjualan store triggered', $request->all());

    //     $validated = $request->validate([
    //         'nota' => 'required|string|exists:penjualan,id_nota',
    //         'kode_barang' => 'required|string|exists:barang,kode_barang',
    //         'qty' => 'required|integer|min:1',
    //     ]);

    //     ItemPenjualan::create($validated);

    //     return response()->json(['message' => 'Item Penjualan berhasil dibuat'], 201);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required',
            'kode_barang' => 'required',
            'qty' => 'required|integer|min:1'
        ]);

        ItemPenjualan::create($request->all());

        // update subtotal otomatis
        $service = new PenjualanService();
        $subtotal = $service->hitungSubtotal($request->nota);

        Penjualan::where('id_nota', $request->nota)
            ->update(['subtotal' => $subtotal]);

        return response()->json(['message' => 'Item berhasil ditambah', 'subtotal' => $subtotal]);
    }


    public function show($nota, $kode_barang)
    {
        $item = ItemPenjualan::where('nota', $nota)
            ->where('kode_barang', $kode_barang)
            ->with(['barang', 'penjualan'])
            ->firstOrFail();

        return response()->json($item);
    }

    public function update(Request $request, $nota, $kode_barang)
    {
        $item = ItemPenjualan::where('nota', $nota)
            ->where('kode_barang', $kode_barang)
            ->firstOrFail();

        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($nota, $kode_barang)
    {
        $item = ItemPenjualan::where('nota', $nota)
            ->where('kode_barang', $kode_barang)
            ->firstOrFail();

        $item->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
