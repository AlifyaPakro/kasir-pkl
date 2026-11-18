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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id_transaksi', 50)->primary(); // PK id_transaksi varchar(50)
            $table->integer('total_harga'); // total_harga int
            $table->dateTime('tanggal'); // tanggal date_time
            $table->string('jenis_pembayaran'); // jenis_pembayaran enum (diubah ke string/enum fleksibel)
            $table->enum('status_pembayaran', ['Berhasil', 'Menunggu']); // status_pembayaran enum
            $table->integer('kembalian')->nullable(); // kembalian int
            
            // Foreign Key ke tabel produks (id_produk varchar(50))
            $table->string('id_produk', 50);
            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
