
@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Taliwarna Kreatif')

@section('content')

@php
    $nama = strtolower($produk->nama_produk);

    if (str_contains($nama, 'tas')) {
        $gambar = 'tas-rajut.jpg';
        $emoji = '👜';
    } elseif (str_contains($nama, 'dompet')) {
        $gambar = 'dompet-rajut.jpg';
        $emoji = '👛';
    } elseif (str_contains($nama, 'boneka')) {
        $gambar = 'boneka-rajut.png';
        $emoji = '🧸';
    } elseif (str_contains($nama, 'buket')) {
        $gambar = 'buket-rajut.jpeg';
        $emoji = '💐';
    } elseif (str_contains($nama, 'gantungan')) {
        $gambar = 'gantungan-rajut.jpg';
        $emoji = '🌸';
    } elseif (str_contains($nama, 'phone pouch')) {
        $gambar = 'phone-pouch.jpg';
        $emoji = '📱';
    } else {
        $gambar = 'tas-rajut.jpg';
        $emoji = '🧶';
    }

    $gambarDefault = asset('images/' . $gambar);
@endphp

<style>
    .detail-section {
        background: #fff8f3;
        min-height: 650px;
    }

    .detail-image-wrapper {
        width: 100%;
        height: 460px;
        background: #ffe8ef;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(113, 59, 67, 0.10);
    }

    .detail-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .detail-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #ffe0eb, #fff4ed);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #c92361;
    }

    .detail-placeholder span {
        font-size: 120px;
    }

    .detail-placeholder p {
        font-weight: 800;
        margin-top: 10px;
    }

    .detail-title {
        color: #713b43;
        font-family: 'Playfair Display', serif;
        font-size: 38px;
        font-weight: 800;
    }

    .detail-price {
        color: #c92361;
        font-size: 29px;
        font-weight: 800;
    }

    .detail-info {
        background: white;
        border-radius: 15px;
        padding: 18px;
        box-shadow: 0 4px 15px rgba(113, 59, 67, 0.06);
    }

    .back-link {
        color: #c92361;
        text-decoration: none;
        font-weight: 800;
    }

    .back-link:hover {
        color: #713b43;
    }

    @media (max-width: 768px) {
        .detail-image-wrapper {
            height: 330px;
        }

        .detail-title {
            font-size: 29px;
        }
    }
</style>

<section class="detail-section py-5">

    <div class="container">

        <!-- KEMBALI -->
        <a href="{{ route('produk.index') }}" class="back-link">
            ← Kembali ke Katalog
        </a>

        <div class="row g-5 mt-3 align-items-center">

            <!-- GAMBAR PRODUK -->
            <div class="col-md-6">

                <div class="detail-image-wrapper">

                    <img
                        src="{{ $produk->foto ? asset('storage/' . $produk->foto) : $gambarDefault }}"
                        class="detail-image"
                        alt="{{ $produk->nama_produk }}"
                        onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    >

                    <!-- Gambar cadangan -->
                    <div class="detail-placeholder" style="display:none;">

                        <span>{{ $emoji }}</span>

                        <p>{{ $produk->nama_produk }}</p>

                    </div>

                </div>

            </div>

            <!-- INFORMASI PRODUK -->
            <div class="col-md-6">

                <span class="badge-category">
                    {{ $produk->kategori->nama_kategori ?? 'Handmade' }}
                </span>

                <h1 class="detail-title mt-4">
                    {{ $produk->nama_produk }}
                </h1>

                <h3 class="detail-price mt-3">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </h3>

                <hr class="my-4">

                <h6 class="fw-bold" style="color:#713b43;">
                    Deskripsi Produk
                </h6>

                <p class="text-secondary" style="line-height:1.9;">
                    {{ $produk->deskripsi ?: 'Produk rajutan handmade yang dibuat dengan penuh ketelitian dan cinta.' }}
                </p>

                <!-- INFORMASI -->
                <div class="detail-info mt-4">

                    <p class="mb-3">
                        <strong>Kategori:</strong>
                        {{ $produk->kategori->nama_kategori ?? 'Handmade' }}
                    </p>

                    <p class="mb-0">
                        <strong>Stok tersedia:</strong>
                        {{ $produk->stok }} unit
                    </p>

                </div>

                <div class="mt-4">

                    <span class="badge-category">
                        ♡ Handmade with Love
                    </span>

                </div>

                <a href="{{ route('produk.index') }}"
                   class="btn btn-pink mt-4">

                    Lihat Produk Lainnya

                </a>

            </div>

        </div>

    </div>

</section>

@endsection
