# Sistem Kasir & Katalog Toko Buku (Laravel)

Aplikasi web berbasis **Laravel** untuk mendukung operasional petugas toko buku, meliputi pengelolaan katalog produk, penambahan produk baru, pencarian produk untuk layanan pengunjung, serta relasi data rak dan transaksi pada database **MySQL**.

---

## Fitur Utama

* **Katalog Produk (`katalog.index`)**: Menampilkan daftar produk dengan filter berdasarkan judul/nama produk dan kategori (`Buku` / `ATK`).
* **Tambah Produk (`katalog.create` & `katalog.store` — US-01)**: Form pencatatan produk baru ke database dengan validasi kode produk unik, kategori, harga dasar, stok awal, dan lokasi rak.
* **Pencarian Produk / Layanan Pengunjung (`katalog.pencarian` — US-08)**: Membantu petugas toko mengecek ketersediaan stok, harga, dan lokasi rak/lorong produk secara cepat untuk menjawab pertanyaan pengunjung.
* **Komponen Navigasi Terpisah**: Menggunakan Blade partial (`resources/views/partials/sidebar.blade.php`) agar menu ruang kerja konsisten di seluruh halaman.

---

## Struktur Database (MySQL)

Database utama yang digunakan adalah `kasir-kelompok` (koneksi `mysql` di `.env`) dengan tabel utama:

* **`raks`**: Menyimpan data rak dan lokasi lorong (`id_rak`, `lokasi_lorong`, timestamps).
* **`produks`**: Menyimpan data produk (`id_produk`, `nama`, `kategori`, `harga`, `stok`, `status`, `id_rak` sebagai *foreign key* ke `raks`, timestamps).
* **`transaksis`**: Menyimpan data transaksi (`id_transaksi`, `total_harga`, `tanggal`, `jenis_pembayaran`, `status_pembayaran`, `kembalian`, `id_produk` sebagai *foreign key* ke `produks`, timestamps).

> **Catatan Urutan Migrasi:** Pastikan tabel `raks` dibuat sebelum `produks`, dan `produks` dibuat sebelum `transaksis` agar *foreign key* tidak gagal saat migrasi dijalankan.

---

## Panduan Instalasi & Menjalankan Project

1. **Masuk ke direktori project**
   ```bash
   cd D:\laragon\www\kasir
