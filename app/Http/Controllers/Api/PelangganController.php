<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(Pelanggan::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|string|unique:pelanggan,id_pelanggan',
            'nama' => 'required|string',
            'domisili' => 'required|string',
            'jenis_kelamin' => 'required|string',
        ]);

        Pelanggan::create($validated);

        return response()->json(['message' => 'Pelanggan berhasil dibuat'], 201);
    }


    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());
        return response()->json($pelanggan);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
