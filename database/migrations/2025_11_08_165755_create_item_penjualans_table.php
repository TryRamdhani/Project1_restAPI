<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_penjualan', function (Blueprint $table) {
            $table->string('nota');
            $table->string('kode_barang');
            $table->integer('qty');
            $table->timestamps();

            $table->primary(['nota', 'kode_barang']);

            $table->foreign('nota')
                ->references('id_nota')
                ->on('penjualan')
                ->cascadeOnDelete();

            $table->foreign('kode_barang')
                ->references('kode_barang')
                ->on('barang')
                ->cascadeOnDelete();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_penjualan');

    }
};
