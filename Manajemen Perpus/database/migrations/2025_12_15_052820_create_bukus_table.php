<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
    $table->id();
    $table->string('judul', 255);
    $table->string('pengarang', 100); // TAMBAHKAN
    $table->year('tahun_terbit');
    $table->integer('stok'); // PERBAIKI
    $table->foreignId('penerbit_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
    $table->foreignId('kategori_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
