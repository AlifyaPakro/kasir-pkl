<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku Gramedia - Tambah Produk Baru</title>
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
        .grid-main { display: grid; grid-template-columns: 2fr 1fr; gap: 24px; align-items: start; }
        .card { background: #ffffff; padding: 24px; border-radius: 8px; border: 1px solid #e5e7eb; }
        .card-title { font-size: 14px; font-weight: 700; color: #111827; margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid #f3f4f6; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full { grid-column: span 2; }
        label { font-size: 12px; font-weight: 600; color: #374151; }
        input, select { width: 100%; border: 1px solid #d1d5db; border-radius: 4px; padding: 9px 12px; font-size: 14px; background: #ffffff; color: #111827; }
        input:focus, select:focus { outline: none; border-color: #111827; }
        .btn-row { display: flex; gap: 12px; margin-top: 24px; padding-top: 16px; border-top: 1px solid #f3f4f6; }
        .btn-dark { flex: 1; background: #27272a; color: #ffffff; font-size: 14px; font-weight: 500; padding: 10px 16px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-dark:hover { background: #000000; }
        .btn-outline { padding: 10px 20px; border: 1px solid #d1d5db; background: #ffffff; color: #374151; font-size: 14px; font-weight: 500; border-radius: 4px; text-decoration: none; text-align: center; }
        .btn-outline:hover { background: #f9fafb; }
        .preview-meta { font-size: 12px; color: #6b7280; font-family: monospace; margin: 4px 0 16px; }
        .preview-rows { border-top: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; padding: 14px 0; margin-bottom: 16px; display: flex; flex-direction: column; gap: 10px; font-size: 13px; }
        .preview-row { display: flex; justify-content: space-between; }
        .note-box { background: #f3f4f6; padding: 14px; border-radius: 4px; border: 1px solid #e5e7eb; font-size: 12px; color: #374151; line-height: 1.5; }
        .alert-err { background: #ffffff; border: 1px solid #111827; padding: 12px 16px; border-radius: 8px; font-size: 13px; color: #111827; }
        .alert-err ul { margin-left: 18px; margin-top: 4px; }
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
                <h2>Tambah produk baru</h2>
                <div class="desc">Mendaftarkan item buku atau alat tulis baru beserta penempatan rak ke sistem katalog.</div>
                <div class="meta-us"><span class="badge-us">US-02</span> • Input master produk baru ke database toko</div>
            </div>

            <div class="step-bar">
                <div><span class="step-num">01</span>Isi identitas produk</div>
                <span class="step-arrow">→</span>
                <div><span class="step-num">02</span>Tentukan harga, stok & rak</div>
                <span class="step-arrow">→</span>
                <div><span class="step-num">03</span>Simpan ke katalog</div>
            </div>

            @if($errors->any())
                <div class="alert-err">
                    <strong>Periksa kembali input Anda:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="grid-main">
                <form method="POST" action="{{ route('katalog.tambah.store') }}" class="card">
                    @csrf
                    <div class="card-title">Formulir Identitas & Stok Produk</div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="id_produk">ID / Kode Produk *</label>
                            <input type="text" id="id_produk" name="id_produk" value="{{ old('id_produk') }}" placeholder="Contoh: BK-02 atau ATK-02" required oninput="updatePreview()">
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori Produk *</label>
                            <select id="kategori" name="kategori" required onchange="updatePreview()">
                                <option value="Buku" {{ old('kategori') === 'Buku' ? 'selected' : '' }}>Buku</option>
                                <option value="ATK" {{ old('kategori') === 'ATK' ? 'selected' : '' }}>ATK (Alat Tulis Kantor)</option>
                            </select>
                        </div>

                        <div class="form-group full">
                            <label for="nama">Judul Buku / Nama Produk *</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Contoh: Bumi Manusia" required oninput="updatePreview()">
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga Satuan (Rp) *</label>
                            <input type="number" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Contoh: 85000" min="0" required oninput="updatePreview()">
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok Awal (Unit) *</label>
                            <input type="number" id="stok" name="stok" value="{{ old('stok') }}" placeholder="Contoh: 15" min="0" required oninput="updatePreview()">
                        </div>

                        <div class="form-group full">
                            <label for="id_rak">Penempatan Rak / Lorong *</label>
                            <select id="id_rak" name="id_rak" required onchange="updatePreview()">
                                <option value="">-- Pilih Lokasi Rak --</option>
                                @foreach($rakList as $rak)
                                    <option value="{{ $rak->id_rak }}" {{ old('id_rak') == $rak->id_rak ? 'selected' : '' }}>
                                        {{ $rak->lokasi_lorong ?? 'Rak #' . $rak->id_rak }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="btn-row">
                        <a href="{{ route('katalog.index') }}" class="btn-outline">Batal</a>
                        <button type="submit" class="btn-dark">Simpan produk baru</button>
                    </div>
                </form>

                <div class="card">
                    <div class="card-title">Pratinjau Kartu Katalog</div>
                    <h3 id="prev-nama" style="font-size: 18px; font-weight: 700;">Nama Produk Baru</h3>
                    <p id="prev-meta" class="preview-meta">KODE / Buku / Aktif</p>

                    <div class="preview-rows">
                        <div class="preview-row">
                            <span style="color: #6b7280;">Harga dasar</span>
                            <span id="prev-harga" style="font-weight: 700;">Rp0</span>
                        </div>
                        <div class="preview-row">
                            <span style="color: #6b7280;">Stok awal</span>
                            <span id="prev-stok" style="font-weight: 700;">0 unit</span>
                        </div>
                        <div class="preview-row">
                            <span style="color: #6b7280;">Lokasi Rak / Lorong</span>
                            <span id="prev-rak" style="font-weight: 700;">Belum dipilih</span>
                        </div>
                    </div>

                    <div class="note-box">
                        <strong>Status Otomatis Aktif:</strong> Setiap produk baru yang disimpan akan langsung berstatus <strong>Aktif</strong> dan tampil pada halaman Katalog serta Pencarian Pengunjung.
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function updatePreview() {
            const kode = document.getElementById('id_produk').value || 'KODE';
            const kategori = document.getElementById('kategori').value || 'Buku';
            const nama = document.getElementById('nama').value || 'Nama Produk Baru';
            const harga = parseInt(document.getElementById('harga').value || 0);
            const stok = document.getElementById('stok').value || 0;
            const rakSelect = document.getElementById('id_rak');
            const rakText = rakSelect.selectedIndex > 0 ? rakSelect.options[rakSelect.selectedIndex].text : 'Belum dipilih';

            document.getElementById('prev-nama').textContent = nama;
            document.getElementById('prev-meta').textContent = `${kode} / ${kategori} / Aktif`;
            document.getElementById('prev-harga').textContent = 'Rp' + harga.toLocaleString('id-ID');
            document.getElementById('prev-stok').textContent = stok + ' unit';
            document.getElementById('prev-rak').textContent = rakText;
        }
    </script>
</body>
</html>
