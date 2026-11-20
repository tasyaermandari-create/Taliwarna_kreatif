<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        if ($request->filled('search')) {
            $query->where(
                'nama_produk',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        $produk = $query->latest()->paginate(9)->withQueryString();

        $kategori = Kategori::all();

        return view('produk.index', compact(
            'produk',
            'kategori'
        ));
    }

    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);

        return view('produk.detail', compact('produk'));
    }
}
