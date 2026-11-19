<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

use Illuminate\Support\Facades\DB;

class KatalogController extends Controller
{
    public function index(Request $request): \Illuminate\View\View 
    {
        $q = $request->input('q', '');
        $kategoriPilihan = $request->input('kategori');

        // Mulai query dengan relasi ke tabel 'rak'
        $query = Produk::with('rak');

        // Filter berdasarkan pencarian nama produk
        if (!empty($q)) {
            $query->where('nama', 'like', '%' . $q . '%');
        }

        // Filter berdasarkan kategori (sesuai enum: 'Buku', 'ATK')
        if (!empty($kategoriPilihan)) {
            $query->where('kategori', $kategoriPilihan);
        }

        // Ambil data produk
        $produk = $query->get();

        return view('katalog.index', compact('produk', 'q', 'kategoriPilihan'));
    }

    public function pencarian(Request $request)
    {
        $keyword = $request->input('q', '');
        $kategori = $request->input('kategori', '');

        // Ambil data produk berdasarkan pencarian, serta eager loading relasi 'rak'
        $query = Produk::with('rak');

        if (!empty($keyword)) {
            $query->where('nama', 'like', '%' . $keyword . '%');
        }

        if (!empty($kategori)) {
            $query->where('kategori', $kategori);
        }

        // Ambil produk pertama yang cocok untuk ditampilkan di card detail sebelah kanan
        $produkDipilih = $query->first();

        return view('katalog.pencarian', compact('produkDipilih', 'keyword', 'kategori'));
    }

    public function nonaktifIndex(Request $request)
    {
        $keyword = $request->input('q', '');
        $statusFilter = $request->input('status', '');

        $query = Produk::with('rak');

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', '%' . $keyword . '%')
                  ->orWhere('id_produk', 'like', '%' . $keyword . '%');
            });
        }

    if ($statusFilter === 'aktif') {
         $query->where('status', 'Aktif');
     } elseif ($statusFilter === 'nonaktif') {
         $query->where('status', 'Non Aktif');
     }


        $produkList = $query->get();
        $produkDipilih = $produkList->first();

        return view('katalog.nonaktifProduk', compact('produkList', 'produkDipilih', 'keyword', 'statusFilter'));
    }

      public function nonaktifToggle($id)
 {
     $produk = Produk::where('id_produk', $id)->firstOrFail();
     $produk->status = ($produk->status === 'Aktif') ? 'Non Aktif' : 'Aktif';
     $produk->save();

     return redirect()->route('katalog.nonaktif')
         ->with('success', "Status produk '{$produk->nama}' berhasil diubah menjadi {$produk->status}.");
 }
    public function tambahIndex()
    {
        $rakList = DB::table('raks')->get();
        return view('katalog.tambahProduk', compact('rakList'));
    }

    public function tambahStore(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|string|max:50|unique:produks,id_produk',
            'nama'      => 'required|string|max:50',
            'kategori'  => 'required|in:Buku,ATK',
            'harga'     => 'required|integer|min:0',
            'stok'      => 'required|integer|min:0',
            'id_rak'    => 'required|exists:raks,id_rak',
        ]);

        $produk = new Produk();
        $produk->id_produk = $request->id_produk;
        $produk->nama      = $request->nama;
        $produk->kategori  = $request->kategori;
        $produk->harga     = $request->harga;
        $produk->stok      = $request->stok;
        $produk->status    = 'Aktif';
        $produk->id_rak    = $request->id_rak;
        $produk->save();

        return redirect()->route('katalog.index')
            ->with('success', "Produk baru '{$produk->nama}' berhasil ditambahkan ke katalog.");
    }
            public function updateIndex(Request $request)
    {
        $keyword = $request->input('q', '');
        $query = Produk::with('rak');

        if (!empty($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', '%' . $keyword . '%')
                  ->orWhere('id_produk', 'like', '%' . $keyword . '%');
            });
        }

        $produkList = $query->get();
        $produkDipilih = $produkList->first();
        $rakList = DB::table('raks')->get();

        return view('katalog.updateProduk', compact('produkList', 'produkDipilih', 'rakList', 'keyword'));
    }

    public function updateStore(Request $request, $id)
    {
        $produk = Produk::where('id_produk', $id)->firstOrFail();

        $request->validate([
            'nama'     => 'required|string|max:50',
            'kategori' => 'required|in:Buku,ATK',
            'harga'    => 'required|integer|min:0',
            'stok'     => 'required|integer|min:0',
            'id_rak'   => 'required|exists:raks,id_rak',
            'status'   => 'required|in:Aktif,Non Aktif',
        ]);

        $produk->nama     = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->harga    = $request->harga;
        $produk->stok     = $request->stok;
        $produk->id_rak   = $request->id_rak;
        $produk->status   = $request->status;
        $produk->save();

        return redirect()->route('katalog.update')
            ->with('success', "Data produk '{$produk->nama}' ({$produk->id_produk}) berhasil diperbarui.");
    }

}

