<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukController extends Controller
{
    // MENAMPILKAN SEMUA PRODUK
    public function index()
    {
        $produk = Produk::with('kategori')
            ->latest()
            ->paginate(10);

        return view('admin.produk.index', compact('produk'));
    }

    // FORM TAMBAH PRODUK
    public function create()
    {
        $kategori = Kategori::all();

        return view('admin.produk.create', compact('kategori'));
    }

    // MENYIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama_produk',
            'kategori_id',
            'harga',
            'stok',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // MENAMPILKAN DETAIL PRODUK
    public function show(string $id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);

        return view('admin.produk.show', compact('produk'));
    }

    // FORM EDIT PRODUK
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();

        return view(
            'admin.produk.edit',
            compact('produk', 'kategori')
        );
    }

    // MEMPERBARUI PRODUK
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'nama_produk',
            'kategori_id',
            'harga',
            'stok',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {

            // HAPUS FOTO LAMA
            if ($produk->foto &&
                Storage::disk('public')->exists($produk->foto)) {

                Storage::disk('public')->delete($produk->foto);
            }

            // SIMPAN FOTO BARU
            $data['foto'] = $request->file('foto')
                ->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // MENGHAPUS PRODUK
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        // HAPUS FOTO PRODUK
        if ($produk->foto &&
            Storage::disk('public')->exists($produk->foto)) {

            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
