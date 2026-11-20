<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_kategori' => 'Tas Rajut',
                'deskripsi' => 'Berbagai tas handmade dari benang rajut.'
            ],
            [
                'nama_kategori' => 'Dompet Rajut',
                'deskripsi' => 'Dompet unik hasil kerajinan rajutan.'
            ],
            [
                'nama_kategori' => 'Boneka Rajut',
                'deskripsi' => 'Boneka lucu buatan tangan.'
            ],
            [
                'nama_kategori' => 'Aksesoris',
                'deskripsi' => 'Aksesoris handmade yang menarik.'
            ],
            [
                'nama_kategori' => 'Souvenir',
                'deskripsi' => 'Souvenir rajutan untuk berbagai acara.'
            ],
        ];

        foreach ($data as $item) {
            Kategori::firstOrCreate(
                ['nama_kategori' => $item['nama_kategori']],
                ['deskripsi' => $item['deskripsi']]
            );
        }
    }
}
