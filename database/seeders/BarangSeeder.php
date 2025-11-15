<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barang')->insert([
            ['kode_barang' => 'BRG_2', 'nama' => 'PENSIL', 'kategori' => 'ATK', 'harga' => 10000],
            ['kode_barang' => 'BRG_3', 'nama' => 'PAYUNG', 'kategori' => 'RT', 'harga' => 70000],
            ['kode_barang' => 'BRG_4', 'nama' => 'PANCI', 'kategori' => 'MASAK', 'harga' => 110000],
            ['kode_barang' => 'BRG_5', 'nama' => 'SAPU', 'kategori' => 'RT', 'harga' => 40000],
            ['kode_barang' => 'BRG_6', 'nama' => 'KIPAS', 'kategori' => 'ELEKTRONIK', 'harga' => 200000],
            ['kode_barang' => 'BRG_7', 'nama' => 'KUALI', 'kategori' => 'MASAK', 'harga' => 120000],
            ['kode_barang' => 'BRG_8', 'nama' => 'SIKAT', 'kategori' => 'RT', 'harga' => 30000],
            ['kode_barang' => 'BRG_9', 'nama' => 'GELAS', 'kategori' => 'RT', 'harga' => 25000],
            ['kode_barang' => 'BRG_10', 'nama' => 'PIRING', 'kategori' => 'RT', 'harga' => 35000],
        ]);
    }
}
