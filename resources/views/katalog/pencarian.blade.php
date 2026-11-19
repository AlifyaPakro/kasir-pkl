<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Gramedia - Layanan Pengunjung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Header Navbar -->
    <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <h1 class="font-black text-lg tracking-wider uppercase">TOKO BUKU <span class="text-gray-600">GRAMEDIA</span></h1>
            <span class="text-xs text-gray-400 border-l pl-4">WIREFRAME • Desktop • Contoh data</span>
        </div>
        <div class="text-sm font-medium text-gray-700">
            Peran: Petugas toko
        </div>
    </header>

    <div class="flex min-h-screen">
        
        <!-- Sidebar Kiri -->
        @include('components.navbar')

        <!-- Konten Utama -->
        <main class="flex-1 p-8 space-y-6">
            
            <!-- Judul Halaman -->
            <div>
                <p class="text-xs text-gray-400 font-semibold mb-1">WIREFRAME 08 • PETUGAS TOKO</p>
                <h2 class="text-2xl font-bold text-gray-900">Layanan pengunjung</h2>
                <p class="text-sm text-gray-600">Membantu menjawab ketersediaan dan lokasi barang.</p>
                <p class="text-xs text-gray-500 mt-1"><span class="bg-gray-200 px-1.5 py-0.5 rounded font-mono">US-08</span> • Gunakan pencarian untuk membantu pengunjung</p>
            </div>

            <!-- Step Guide Bar -->
            <div class="bg-gray-100 border border-gray-200 p-4 rounded-lg flex items-center space-x-6 text-sm font-medium text-gray-700">
                <div class="flex items-center space-x-2">
                    <span class="bg-gray-300 text-gray-800 px-2 py-0.5 rounded text-xs font-bold">01</span>
                    <span>Terima pertanyaan</span>
                </div>
                <span class="text-gray-400">→</span>
                <div class="flex items-center space-x-2">
                    <span class="bg-gray-300 text-gray-800 px-2 py-0.5 rounded text-xs font-bold">02</span>
                    <span>Cari produk</span>
                </div>
                <span class="text-gray-400">→</span>
                <div class="flex items-center space-x-2">
                    <span class="bg-gray-300 text-gray-800 px-2 py-0.5 rounded text-xs font-bold">03</span>
                    <span>Sampaikan stok & lokasi</span>
                </div>
            </div>

            <!-- Form Pencarian (GET Request ke Controller) -->
            <form method="GET" action="{{ route('katalog.pencarian') }}" class="bg-white p-6 rounded-lg border border-gray-200 grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Cari judul / nama produk</label>
                    <input type="text" name="q" value="{{ $keyword ?? '' }}" placeholder="Contoh: Laskar" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-black">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" value="{{ $kategori ?? '' }}" placeholder="Contoh: Buku" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-black">
                </div>
                <div>
                    <button type="submit" class="w-full bg-zinc-800 hover:bg-black text-white text-sm font-medium py-2 px-4 rounded transition">
                        Cari produk
                    </button>
                </div>
            </form>

            <!-- Grid Hasil Interaksi (Kiri: Pertanyaan/Jawaban, Kanan: Detail Produk dari DB) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Kotak Simulasi Percakapan -->
                <div class="bg-white p-6 rounded-lg border border-gray-200 flex flex-col justify-between shadow-sm">
                    <div>
                        <p class="text-xs font-semibold text-gray-400 mb-3">PERTANYAAN PENGUNJUNG</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-4">
                            “Apakah {{ $produkDipilih ? $produkDipilih->nama : 'Produk' }} tersedia? Letaknya di mana?”
                        </h3>

                        <!-- Kotak Jawaban Petugas -->
                        <div class="bg-gray-100 p-4 rounded border border-gray-200 space-y-1">
                            <p class="text-[10px] font-bold text-gray-500 tracking-wider">JAWABAN PETUGAS</p>
                            @if($produkDipilih)
                                <p class="text-sm font-semibold text-gray-800">
                                    “Tersedia {{ $produkDipilih->stok }} unit, harganya Rp{{ number_format($produkDipilih->harga, 0, ',', '.') }}. Buku ada di lorong {{ $produkDipilih->rak->lokasi_lorong ?? 'Belum ditentukan' }}.”
                                </p>
                            @else
                                <p class="text-sm font-semibold text-red-600">
                                    “Maaf, produk tidak ditemukan di database.”
                                </p>
                            @endif
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-6">Gunakan informasi aktual dari produk yang dipilih.</p>
                </div>

                <!-- Kotak Detail Produk (Dinamis dari Database) -->
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm flex flex-col justify-between">
                    @if($produkDipilih)
                        <div>
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold text-gray-900">{{ $produkDipilih->nama }}</h3>
                            </div>
                            <p class="text-xs text-gray-500 mb-6 font-mono">
                                {{ $produkDipilih->id_produk }} / {{ $produkDipilih->kategori }} / {{ $produkDipilih->status ?? 'Aktif' }}
                            </p>

                            <div class="space-y-2 text-sm text-gray-700 border-t border-b border-gray-100 py-4 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Harga dasar</span>
                                    <span class="font-bold">Rp{{ number_format($produkDipilih->harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Stok tersisa</span>
                                    <span class="font-bold">{{ $produkDipilih->stok }} unit</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Lokasi Rak / Lorong</span>
                                    <span class="font-bold">{{ $produkDipilih->rak->lokasi_lorong ?? '-' }}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="#" class="block text-center w-full border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-medium py-2 rounded transition">
                                Lihat detail produk
                            </a>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-full text-gray-400 text-sm">
                            Tidak ada data produk yang dipilih/ditemukan.
                        </div>
                    @endif
                </div>

            </div>

            <!-- Footer Bantuan Kondisional -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-100 border border-gray-200 p-4 rounded-lg text-xs text-gray-600">
                <div>
                    <span class="font-bold uppercase text-gray-700 block mb-1">Jika stok habis</span>
                    Sampaikan barang sedang habis. Jangan menjanjikan jadwal restok yang belum tersedia.
                </div>
                <div>
                    <span class="font-bold uppercase text-gray-700 block mb-1">Jika tidak ditemukan</span>
                    Periksa ejaan judul dan kategori. Produk nonaktif tidak ditawarkan sebagai produk tersedia.
                </div>
            </div>

        </main>
    </div>

</body>
</html>