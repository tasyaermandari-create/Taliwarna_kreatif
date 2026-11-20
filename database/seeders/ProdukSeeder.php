<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $dataProduk = [
            [
                'nama_produk' => 'Tas Rajut Pastel',
                'kategori' => 'Tas Rajut',
                'harga' => 125000,
                'stok' => 15,
                'deskripsi' => 'Tas rajut handmade dengan warna pastel yang cantik dan cocok digunakan untuk aktivitas sehari-hari.',
            ],
            [
                'nama_produk' => 'Dompet Rajut Mini',
                'kategori' => 'Dompet Rajut',
                'harga' => 55000,
                'stok' => 20,
                'deskripsi' => 'Dompet rajut mini yang praktis, unik, dan dibuat dengan teliti menggunakan bahan berkualitas.',
            ],
            [
                'nama_produk' => 'Boneka Amigurumi',
                'kategori' => 'Boneka Rajut',
                'harga' => 85000,
                'stok' => 12,
                'deskripsi' => 'Boneka rajut handmade bergaya amigurumi yang lucu dan cocok dijadikan hadiah.',
            ],
            [
                'nama_produk' => 'Buket Bunga Rajut',
                'kategori' => 'Aksesoris',
                'harga' => 100000,
                'stok' => 10,
                'deskripsi' => 'Buket bunga dari rajutan tangan yang cantik dan tahan lama untuk hadiah spesial.',
            ],
            [
                'nama_produk' => 'Gantungan Kunci Rajut',
                'kategori' => 'Aksesoris',
                'harga' => 25000,
                'stok' => 30,
                'deskripsi' => 'Gantungan kunci rajut handmade dengan desain menarik dan ukuran praktis.',
            ],
            [
                'nama_produk' => 'Phone Pouch Rajut',
                'kategori' => 'Souvenir',
                'harga' => 65000,
                'stok' => 18,
                'deskripsi' => 'Tempat penyimpanan handphone berbahan rajut yang praktis dan memiliki tampilan menarik.',
            ],
        ];

        foreach ($dataProduk as $item) {
            $kategori = Kategori::where(
                'nama_kategori',
                $item['kategori']
            )->first();

            if (!$kategori) {
                continue;
            }

            Produk::updateOrCreate(
                [
                    'nama_produk' => $item['nama_produk'],
                ],
                [
                    'kategori_id' => $kategori->id,
                    'harga' => $item['harga'],
                    'stok' => $item['stok'],
                    'deskripsi' => $item['deskripsi'],
                    'foto' => null,
                ]
            );
        }
    }
}
