<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;

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
}
