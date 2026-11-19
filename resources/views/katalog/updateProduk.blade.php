<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Gramedia - Update Data Produk</title>
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
        .search-bar { background: #ffffff; padding: 20px 24px; border-radius: 8px; border: 1px solid #e5e7eb; display: grid; grid-template-columns: 3fr 1fr; gap: 16px; align-items: end; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1.35fr; gap: 24px; align-items: start; }
        .card { background: #ffffff; border-radius: 8px; border: 1px solid #e5e7eb; overflow: hidden; }
        .card-pad { background: #ffffff; padding: 24px; border-radius: 8px; border: 1px solid #e5e7eb; }
        .card-header { padding: 16px 24px; border-bottom: 1px solid #e5e7eb; display: flex; justify-content: space-between; align-items: center; font-size: 12px; font-weight: 600; color: #6b7280; text-transform: uppercase; }
        .item-row { padding: 16px 24px; border-bottom: 1px solid #f3f4f6; display: flex; justify-content: space-between; align-items: center; cursor: pointer; }
        .item-row:hover, .item-row.selected { background: #f3f4f6; }
        .item-row h4 { font-size: 14px; font-weight: 700; color: #111827; }
        .item-row p { font-size: 12px; color: #6b7280; font-family: monospace; margin-top: 2px; }
        .pill { background: #e5e7eb; color: #1f2937; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: 600; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full { grid-column: span 2; }
        label { font-size: 12px; font-weight: 600; color: #374151; }
        input, select { width: 100%; border: 1px solid #d1d5db; border-radius: 4px; padding: 9px 12px; font-size: 14px; background: #ffffff; color: #111827; }
        input:read-only { background: #f3f4f6; color: #6b7280; font-family: monospace; }
        input:focus, select:focus { outline: none; border-color: #111827; }
        .btn-dark { width: 100%; background: #27272a; color: #ffffff; font-size: 14px; font-weight: 500; padding: 10px 16px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-dark:hover { background: #000000; }
        .alert-box { background: #ffffff; border: 1px solid #d1d5db; padding: 12px 16px; border-radius: 8px; font-size: 14px; }
        .footer-box { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; background: #f3f4f6; border: 1px solid #e5e7eb; padding: 16px; border-radius: 8px; font-size: 12px; color: #4b5563; line-height: 1.5; }
        .footer-title { font-weight: 700; text-transform: uppercase; color: #374151; display: block; margin-bottom: 4px; }
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
        @include('components.navbar')

        <main>
            <div>
                <div class="kicker">WIREFRAME • MANAJEMEN KATALOG</div>
                <h2>Update data produk</h2>
                <div class="desc">Memperbarui harga, jumlah stok, lokasi rak, atau detail produk di database.</div>
                <div class="meta-us"><span class="badge-us">US-03</span> • Edit informasi produk katalog yang sudah terdaftar</div>
            </div>

            <div class="step-bar">
                <div><span class="step-num">01</span>Pilih produk di daftar kiri</div>
                <span class="step-arrow">→</span>
                <div><span class="step-num">02</span>Ubah harga, stok, atau rak</div>
                <span class="step-arrow">→</span>
                <div><span class="step-num">03</span>Simpan perubahan</div>
            </div>

            @if(session('success'))
                <div class="alert-box">
                    <strong>Info:</strong> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-box" style="border-color: #111827;">
                    <strong>Periksa kembali input Anda:</strong> {{ $errors->first() }}
                </div>
            @endif

            <form method="GET" action="{{ route('katalog.update') }}" class="search-bar">
                <div class="form-group">
                    <label>Cari judul / ID produk yang akan diubah</label>
                    <input type="text" name="q" value="{{ $keyword ?? '' }}" placeholder="Contoh: Laskar atau BK-01">
                </div>
                <div>
                    <button type="submit" class="btn-dark">Cari produk</button>
                </div>
            </form>
            <div class="grid-2">
                <div class="card">
                    <div class="card-header">
                        <span>Pilih Produk</span>
                        <span style="font-family: monospace;">{{ $produkList->count() }} item</span>
                    </div>

                    <div>
                        @forelse($produkList as $index => $item)
                            <div onclick="pilihItemUpdate(this)"
                                 data-id="{{ $item->id_produk }}"
                                 data-nama="{{ $item->nama }}"
                                 data-kategori="{{ $item->kategori }}"
                                 data-harga="{{ $item->harga }}"
                                 data-stok="{{ $item->stok }}"
                                 data-rak="{{ $item->id_rak }}"
                                 data-status="{{ $item->status ?? 'Aktif' }}"
                                 data-action="{{ route('katalog.update.store', $item->id_produk) }}"
                                 class="item-row {{ $index === 0 ? 'selected' : '' }}">
                                <div>
                                    <h4>{{ $item->nama }}</h4>
                                    <p>{{ $item->id_produk }} / Rp{{ number_format($item->harga, 0, ',', '.') }} / {{ $item->stok }} unit</p>
                                </div>
                                <span class="pill">Edit</span>
                            </div>
                        @empty
                            <div style="padding: 32px; text-align: center; font-size: 14px; color: #9ca3af;">
                                Produk tidak ditemukan di database.
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="card-pad">
                    @if($produkDipilih)
                        <form id="form-update" method="POST" action="{{ route('katalog.update.store', $produkDipilih->id_produk) }}">
                            @csrf
                            @method('PUT')

                            <div style="font-size: 14px; font-weight: 700; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #f3f4f6;">
                                Formulir Perubahan Data Produk
                            </div>

                            <div class="form-grid">
                                <div class="form-group">
                                    <label>ID Produk (Kunci Utama)</label>
                                    <input type="text" id="upd-id" value="{{ $produkDipilih->id_produk }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Kategori *</label>
                                    <select id="upd-kategori" name="kategori" required>
                                        <option value="Buku" {{ $produkDipilih->kategori === 'Buku' ? 'selected' : '' }}>Buku</option>
                                        <option value="ATK" {{ $produkDipilih->kategori === 'ATK' ? 'selected' : '' }}>ATK</option>
                                    </select>
                                </div>

                                <div class="form-group full">
                                    <label>Judul Buku / Nama Produk *</label>
                                    <input type="text" id="upd-nama" name="nama" value="{{ $produkDipilih->nama }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Harga Dasar (Rp) *</label>
                                    <input type="number" id="upd-harga" name="harga" value="{{ $produkDipilih->harga }}" min="0" required>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Stok (Unit) *</label>
                                    <input type="number" id="upd-stok" name="stok" value="{{ $produkDipilih->stok }}" min="0" required>
                                </div>

                                <div class="form-group">
                                    <label>Lokasi Rak / Lorong *</label>
                                    <select id="upd-rak" name="id_rak" required>
                                        @foreach($rakList as $rak)
                                            <option value="{{ $rak->id_rak }}" {{ $produkDipilih->id_rak == $rak->id_rak ? 'selected' : '' }}>
                                                {{ $rak->lokasi_lorong ?? 'Rak #' . $rak->id_rak }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status Katalog *</label>
                                    <select id="upd-status" name="status" required>
                                        <option value="Aktif" {{ ($produkDipilih->status ?? 'Aktif') === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Non Aktif" {{ ($produkDipilih->status ?? '') === 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                                    </select>
                                </div>
                            </div>

                            <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid #f3f4f6;">
                                <button type="submit" class="btn-dark">Simpan perubahan produk</button>
                            </div>
                        </form>
                    @else
                        <div style="text-align: center; color: #9ca3af; font-size: 14px; padding: 40px 0;">
                            Pilih produk dari daftar di sebelah kiri untuk mengedit datanya.
                        </div>
                    @endif
                </div>
            </div>

            <div class="footer-box">
                <div>
                    <span class="footer-title">Validasi perubahan harga</span>
                    Pastikan harga baru sesuai dengan label fisik yang terpasang di rak sebelum menyimpan perubahan.
                </div>
                <div>
                    <span class="footer-title">Penyesuaian stok fisik</span>
                    Gunakan pembaruan stok ini saat terjadi selisih hitung atau penerimaan barang baru.
                </div>
            </div>
        </main>
    </div>

    <script>
        function pilihItemUpdate(el) {
            document.querySelectorAll('.item-row').forEach(row => row.classList.remove('selected'));
            el.classList.add('selected');

            document.getElementById('form-update').action = el.dataset.action;
            document.getElementById('upd-id').value = el.dataset.id;
            document.getElementById('upd-nama').value = el.dataset.nama;
            document.getElementById('upd-kategori').value = el.dataset.kategori;
            document.getElementById('upd-harga').value = el.dataset.harga;
            document.getElementById('upd-stok').value = el.dataset.stok;
            document.getElementById('upd-rak').value = el.dataset.rak;
            document.getElementById('upd-status').value = el.dataset.status;
        }
    </script>
</body>
</html>
