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
}
