<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')
            ->latest()
            ->take(8)
            ->get();

        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();

        return view('home', compact(
            'produk',
            'totalProduk',
            'totalKategori'
        ));
    }
}
