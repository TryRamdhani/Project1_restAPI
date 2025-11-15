<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\PenjualanController;
use App\Http\Controllers\Api\ItemPenjualanController;

Route::apiResource('pelanggan', PelangganController::class);
// Route::post('/pelanggan', [PelangganController::class, 'store']);

Route::apiResource('barang', BarangController::class);

Route::apiResource('penjualan', PenjualanController::class);

Route::get('/itempenjualan', [ItemPenjualanController::class, 'index']);
Route::post('/itempenjualan', [ItemPenjualanController::class, 'store']);

Route::get('/itempenjualan/{nota}/{kode_barang}', [ItemPenjualanController::class, 'show']);
Route::put('/itempenjualan/{nota}/{kode_barang}', [ItemPenjualanController::class, 'update']);
Route::delete('/itempenjualan/{nota}/{kode_barang}', [ItemPenjualanController::class, 'destroy']);





Route::get('/test', function () {
    return response()->json(['message' => 'API connected successfully!']);
});