<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rak;
use App\Models\Produk; 
use App\Models\Transaksi;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Tambah Data Rak (id_rak akan otomatis increment: 1, 2, dst)
        $rak1 = Rak::create([
            'lokasi_lorong' => 'Lorong A - Bagian Depan',
        ]);

        $rak2 = Rak::create([
            'lokasi_lorong' => 'Lorong B - Bagian Buku',
        ]);

        // 2. Tambah Data Produk (berelasi dengan id_rak)
        Produk::create([
            'id_produk' => 'BK-01',
            'nama' => 'Laskar Pelangi',
            'kategori' => 'Buku',
            'harga' => 20000,
            'stok' => 12,
            'status' => 'Aktif',
            'id_rak' => $rak2->id_rak, // Mengambil ID dari rak yang baru dibuat
        ]);

        Produk::create([
            'id_produk' => 'ATK-01',
            'nama' => 'Pulpen Hitam Standard',
            'kategori' => 'ATK',
            'harga' => 5000,
            'stok' => 50,
            'status' => 'Aktif',
            'id_rak' => $rak1->id_rak,
        ]);

        // 3. Tambah Data Transaksi (berelasi dengan id_produk)
        Transaksi::create([
            'id_transaksi' => 'TRX-001',
            'total_harga' => 40000,
            'tanggal' => now(),
            'jenis_pembayaran' => 'Cash',
            'status_pembayaran' => 'Berhasil',
            'kembalian' => 10000,
            'id_produk' => 'BK-01', // Harus sesuai dengan id_produk yang ada
        ]);
    }
}
