<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Gramedia - Nonaktifkan Produk</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: system-ui, -apple-system, sans-serif; }
        body { background-color: #f3f4f6; color: #111827; }
        header { background: #ffffff; border-bottom: 1px solid #e5e7eb; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; }
        .header-left { display: flex; align-items: center; }
        header h1 { font-size: 18px; font-weight: 900; letter-spacing: 0.05em; text-transform: uppercase; }
        header h1 span { color: #4b5563; }
        header .sub { font-size: 12px; color: #9ca3af; border-left: 1px solid #e5e7eb; padding-left: 16px; margin-left: 16px; }
        header .role { font-size: 14px; font-weight: 500; color: #374151; }
        .layout { display: flex; min-height: 100vh; }
        aside { width: 256px; background: #f9fafb; border-right: 1px solid #e5e7eb; padding: 24px; flex-shrink: 0; }
        aside p { font-size: 12px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 12px; }
        aside nav { display: flex; flex-direction: column; gap: 4px; }
        aside a { display: block; padding: 8px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none; }
        aside a:hover { background: #e5e7eb; }
        aside a.active { background: #e5e7eb; font-weight: 600; color: #111827; }
        main { flex: 1; padding: 32px; display: flex; flex-direction: column; gap: 24px; }
        .kicker { font-size: 12px; color: #9ca3af; font-weight: 600; margin-bottom: 4px; }
        h2 { font-size: 24px; font-weight: 700; color: #111827; }
        .desc { font-size: 14px; color: #4b5563; margin-top: 2px; }
        .meta-us { font-size: 12px; color: #6b7280; margin-top: 6px; }
        .badge-us { display: inline-block; background: #e5e7eb; padding: 2px 6px; border-radius: 4px; font-family: monospace; font-weight: 600; color: #1f2937; }
        .step-bar { background: #f3f4f6; border: 1px solid #e5e7eb; padding: 16px; border-radius: 8px; display: flex; align-items: center; gap: 20px; font-size: 14px; font-weight: 500; color: #374151; }
        .step-num { background: #d1d5db; color: #1f2937; padding: 2px 8px; border-radius: 4px; font-size: 12px; font-weight: 700; margin-right: 6px; }
        .step-arrow { color: #9ca3af; }
        .filter-box { background: #ffffff; padding: 24px; border-radius: 8px; border: 1px solid #e5e7eb; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; align-items: end; }
        .filter-box label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .filter-box input, .filter-box select { width: 100%; border: 1px solid #d1d5db; border-radius: 4px; padding: 8px 12px; font-size: 14px; background: #fff; }
        .btn-dark { width: 100%; background: #27272a; color: #ffffff; font-size: 14px; font-weight: 500; padding: 9px 16px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-dark:hover { background: #000000; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start; }
        .card { background: #ffffff; border-radius: 8px; border: 1px solid #e5e7eb; overflow: hidden; }
        .card-header { padding: 16px 24px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center; font-size: 12px; font-weight: 600; color: #6b7280; text-transform: uppercase; }
        .item-row { padding: 16px 24px; border-bottom: 1px solid #f3f4f6; display: flex; justify-content: space-between; align-items: center; cursor: pointer; }
        .item-row:hover, .item-row.selected { background: #f3f4f6; }
        .item-row h4 { font-size: 14px; font-weight: 700; color: #111827; }
        .item-row p { font-size: 12px; color: #6b7280; font-family: monospace; margin-top: 2px; }
        .status-pill { background: #e5e7eb; color: #1f2937; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; }
        .status-off { border: 1px solid #d1d5db; color: #9ca3af; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; text-decoration: line-through; }
        .detail-card { background: #ffffff; padding: 24px; border-radius: 8px; border: 1px solid #e5e7eb; display: flex; flex-direction: column; justify-content: space-between; }
        .detail-card h3 { font-size: 20px; font-weight: 700; color: #111827; }
        .detail-meta { font-size: 12px; color: #6b7280; font-family: monospace; margin: 4px 0 20px; }
        .detail-rows { border-top: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; padding: 16px 0; margin-bottom: 20px; display: flex; flex-direction: column; gap: 12px; font-size: 14px; }
        .detail-row { display: flex; justify-content: space-between; }
        .detail-label { color: #6b7280; }
        .detail-val { font-weight: 700; color: #111827; }
        .note-box { background: #f3f4f6; padding: 16px; border-radius: 4px; border: 1px solid #e5e7eb; margin-bottom: 20px; font-size: 12px; color: #374151; line-height: 1.5; }
        .note-title { font-size: 10px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; }
        .footer-box { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; background: #f3f4f6; border: 1px solid #e5e7eb; padding: 16px; border-radius: 8px; font-size: 12px; color: #4b5563; line-height: 1.5; }
        .footer-title { font-weight: 700; text-transform: uppercase; color: #374151; display: block; margin-bottom: 4px; }
        .alert-box { background: #ffffff; border: 1px solid #d1d5db; padding: 12px 16px; border-radius: 8px; font-size: 14px; }
    </style>
</head>
<body>

    <header>
        <div class="header-left">
            <h1>TOKO BUKU <span>GRAMEDIA</span></h1>
            <span class="sub">WIREFRAME • Desktop • Contoh data</span>
        </div>
        <div class="role">Peran: Petugas toko</div>
    </header>

    <div class="layout">
               <aside style="width: 256px; background: #f9fafb; border-right: 1px solid #e5e7eb; padding: 24px; flex-shrink: 0;">
            <p style="font-size: 12px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 12px;">Ruang Kerja</p>
            <nav style="display: flex; flex-direction: column; gap: 4px;">
                <a href="{{ route('katalog.index') }}" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none;">Katalog produk</a>
                <a href="{{ route('katalog.pencarian') }}" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none;">Pencarian produk</a>
                <a href="{{ route('katalog.tambah') }}" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none;">Tambah produk</a>
                <a href="{{ route('katalog.update') }}" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none;">Update produk</a>
                <a href="{{ route('katalog.nonaktif') }}" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; background: #e5e7eb; font-weight: 600; color: #111827; text-decoration: none;">Nonaktifkan produk</a>
                <a href="{{ route('katalog.index') }}" onclick="alert('Halaman Rak & Lorong belum tersedia di route.'); return false;" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none;">Rak & lorong</a>
                <a href="{{ route('katalog.index') }}" onclick="alert('Halaman Validasi Stok belum tersedia di route.'); return false;" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none;">Validasi stok</a>
                <a href="{{ route('katalog.index') }}" onclick="alert('Halaman Kontrol Rilis PM belum tersedia di route.'); return false;" style="display: block; padding: 9px 12px; border-radius: 6px; font-size: 14px; color: #4b5563; text-decoration: none;">Kontrol rilis PM</a>
            </nav>
        </aside>


        <main>
            <div>
                <div class="kicker">WIREFRAME • PETUGAS TOKO</div>
                <h2>Nonaktifkan produk</h2>
                <div class="desc">Mengarsipkan produk yang tidak lagi dijual tanpa menghapus riwayat stok.</div>
                <div class="meta-us"><span class="badge-us">US-04</span> • Ubah status ketersediaan produk katalog</div>
            </div>

            <div class="step-bar">
                <div><span class="step-num">01</span>Pilih produk</div>
                <span class="step-arrow">→</span>
                <div><span class="step-num">02</span>Periksa stok & lokasi rak</div>
                <span class="step-arrow">→</span>
                <div><span class="step-num">03</span>Konfirmasi nonaktif</div>
            </div>

            @if(session('success'))
                <div class="alert-box">
                    <strong>Info:</strong> {{ session('success') }}
                </div>
            @endif

            <form method="GET" action="{{ route('katalog.nonaktif') }}" class="filter-box">
                <div>
                    <label>Cari judul / ID produk</label>
                    <input type="text" name="q" value="{{ $keyword ?? '' }}" placeholder="Contoh: Laskar atau BK-01">
                </div>
                <div>
                    <label>Filter status</label>
                    <select name="status">
                        <option value="">Semua status</option>
                        <option value="aktif" {{ ($statusFilter ?? '') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ ($statusFilter ?? '') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn-dark">Filter daftar</button>
                </div>
            </form>
            <div class="grid-2">
                <div class="card">
                    <div class="card-header">
                        <span>Daftar Produk Katalog</span>
                        <span style="font-family: monospace;">{{ $produkList->count() }} produk</span>
                    </div>

                    <div>
                        @forelse($produkList as $index => $item)
                            <div onclick="pilihItemNonaktif(this)"
                                 data-nama="{{ $item->nama }}"
                                 data-kode="{{ $item->id_produk }}"
                                 data-kategori="{{ $item->kategori }}"
                                 data-harga="Rp{{ number_format($item->harga, 0, ',', '.') }}"
                                 data-stok="{{ $item->stok }} unit"
                                 data-rak="{{ $item->rak->lokasi_lorong ?? '-' }}"
                                 data-status="{{ $item->status ?? 'Aktif' }}"
                                 data-action="{{ route('katalog.nonaktif.toggle', $item->id_produk) }}"
                                 class="item-row {{ $index === 0 ? 'selected' : '' }}">
                                <div>
                                    <h4>{{ $item->nama }}</h4>
                                    <p>{{ $item->id_produk }} / {{ $item->kategori }} / {{ $item->stok }} unit</p>
                                </div>
                                <div>
                                    @if(($item->status ?? 'Aktif') === 'Aktif')
                                        <span class="status-pill">Aktif</span>
                                    @else
                                        <span class="status-off">Nonaktif</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div style="padding: 32px; text-align: center; font-size: 14px; color: #9ca3af;">
                                Tidak ada data produk yang ditemukan.
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="detail-card">
                    @if($produkDipilih)
                        <div>
                            <h3 id="panel-nama">{{ $produkDipilih->nama }}</h3>
                            <p id="panel-meta" class="detail-meta">
                                {{ $produkDipilih->id_produk }} / {{ $produkDipilih->kategori }} / {{ $produkDipilih->status ?? 'Aktif' }}
                            </p>

                            <div class="detail-rows">
                                <div class="detail-row">
                                    <span class="detail-label">Harga dasar</span>
                                    <span id="panel-harga" class="detail-val">Rp{{ number_format($produkDipilih->harga, 0, ',', '.') }}</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Stok tersisa</span>
                                    <span id="panel-stok" class="detail-val">{{ $produkDipilih->stok }} unit</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Lokasi Rak / Lorong</span>
                                    <span id="panel-rak" class="detail-val">{{ $produkDipilih->rak->lokasi_lorong ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="note-box">
                                <div class="note-title">Catatan Pengarsipan</div>
                                Produk dengan status <strong>Nonaktif</strong> tidak ditawarkan kepada pengunjung pada menu pencarian, namun riwayat transaksi dan stok tetap tersimpan aman.
                            </div>
                        </div>

                        <form id="form-nonaktif" method="POST" action="{{ route('katalog.nonaktif.toggle', $produkDipilih->id_produk) }}">
                            @csrf
                            @method('PATCH')
                            <button id="btn-submit-nonaktif" type="submit" class="btn-dark">
                                {{ ($produkDipilih->status ?? 'Aktif') === 'Aktif' ? 'Nonaktifkan produk ini' : 'Aktifkan kembali produk' }}
                            </button>
                        </form>
                    @else
                        <div style="text-align: center; color: #9ca3af; font-size: 14px; padding: 40px 0;">
                            Tidak ada data produk yang dipilih/ditemukan.
                        </div>
                    @endif
                </div>
            </div>

            <div class="footer-box">
                <div>
                    <span class="footer-title">Jika stok masih tersisa</span>
                    Pastikan barang fisik di rak sudah ditarik atau dipindahkan ke gudang retur sebelum menonaktifkan produk.
                </div>
                <div>
                    <span class="footer-title">Dampak pada layanan pengunjung</span>
                    Produk nonaktif tidak ditawarkan sebagai produk tersedia di layar pencarian petugas toko.
                </div>
            </div>
        </main>
    </div>

    <script>
        function pilihItemNonaktif(el) {
            document.querySelectorAll('.item-row').forEach(row => row.classList.remove('selected'));
            el.classList.add('selected');

            document.getElementById('panel-nama').textContent = el.dataset.nama;
            document.getElementById('panel-meta').textContent = `${el.dataset.kode} / ${el.dataset.kategori} / ${el.dataset.status}`;
            document.getElementById('panel-harga').textContent = el.dataset.harga;
            document.getElementById('panel-stok').textContent = el.dataset.stok;
            document.getElementById('panel-rak').textContent = el.dataset.rak;

            const form = document.getElementById('form-nonaktif');
            const btn = document.getElementById('btn-submit-nonaktif');
            form.action = el.dataset.action;
            btn.textContent = el.dataset.status === 'Aktif' ? 'Nonaktifkan produk ini' : 'Aktifkan kembali produk';
        }
    </script>
</body>
</html>
