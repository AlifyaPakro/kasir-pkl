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
        Schema::create('produks', function (Blueprint $table) {
            $table->string('id_produk', 50)->primary(); // PK id_produk / kode varchar(50)
            $table->string('nama', 50); // Nama varchar(50)
            $table->enum('kategori', ['Buku', 'ATK']); // Kategori enum("Buku", "ATK")
            $table->integer('harga'); // Harga int
            $table->integer('stok'); // Stok int
            $table->enum('status', ['Aktif', 'Non Aktif'])->default('Aktif'); // Status enum
            
            // Foreign Key ke tabel raks (id_rak bertipe unsignedBigInteger karena bawaan $table->id())
            $table->unsignedBigInteger('id_rak');
            $table->foreign('id_rak')->references('id_rak')->on('raks')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
