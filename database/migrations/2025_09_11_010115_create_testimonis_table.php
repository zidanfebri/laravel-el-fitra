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
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id(); // Kolom id (primary key)
            $table->string('gambar')->nullable(); // Kolom gambar (path file, nullable)
            $table->string('nama'); // Kolom nama
            $table->text('keterangan'); // Kolom keterangan
            $table->date('tanggal'); // Kolom tanggal
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};