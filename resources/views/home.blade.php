
@extends('layouts.app')

@section('title', 'Beranda - Taliwarna Kreatif')

@push('styles')
<style>
    .hero-taliwarna {
        background: linear-gradient(120deg, #ffe0eb, #fff8f3);
        padding: 65px 0;
    }

    .hero-image {
        width: 100%;
        height: 390px;
        object-fit: cover;
        border-radius: 28px;
        box-shadow: 0 12px 30px #713b4320;
    }

    .home-product-card {
        background: white;
        border: none;
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 5px 20px rgba(113, 59, 67, 0.08);
        transition: 0.3s;
    }

    .home-product-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 28px rgba(113, 59, 67, 0.15);
    }

    .home-image-wrapper {
        width: 100%;
        height: 230px;
        overflow: hidden;
        background: #ffe8ef;
    }

    .home-product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .home-product-name {
        color: #713b43;
        min-height: 45px;
    }

    .home-product-price {
        color: #c92361;
        font-weight: 800;
        font-size: 18px;
    }

    .about-section {
        background: #ffeaf1;
    }

    .stat-card {
        background: white;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 5px 18px #713b4310;
    }

    .about-icon {
        font-size: 100px;
    }

    @media(max-width:768px) {
        .hero-image {
            height: 260px;
        }

        .hero-taliwarna {
            padding: 35px 0;
        }
    }
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="hero-taliwarna">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="badge-category">
                    ♡ Handmade with Love
                </span>

                <h1 class="display-4 fw-bold mt-3"
                    style="font-family:'Playfair Display',serif;color:#713b43;">

                    Merajut Ide,<br>

                    <span style="color:#c92361;">
                        Mewarnai Hidup.
                    </span>

                </h1>

                <p class="fs-5 mt-3">
                    Temukan berbagai kerajinan rajut handmade
                    yang unik, cantik, dan dibuat dengan penuh cinta.
                    Setiap karya memiliki cerita tersendiri.
                </p>

                <a href="{{ route('produk.index') }}"
                   class="btn-pink mt-2">
                    Jelajahi Koleksi →
                </a>

                <a href="#tentang"
                   class="btn-outline-pink mt-2 ms-2">
                    Tentang Kami
                </a>

            </div>

            <div class="col-lg-6">

               <img
    src="{{ asset('images/tas-rajut.png') }}"
    alt="Tas Rajut Handmade Taliwarna"
    class="hero-image"
    onerror="this.onerror=null; this.alt='Gambar tas rajut tidak ditemukan';">

            </div>

        </div>
    </div>
</section>


{{-- STATISTIK --}}
<section class="py-4">
    <div class="container">

        <div class="row g-3">

            <div class="col-md-6">
                <div class="stat-card text-center">

                    <h2 class="fw-bold" style="color:#c92361;">
                        {{ $totalProduk }}
                    </h2>

                    <p class="mb-0 fw-bold">
                        Koleksi Produk
                    </p>

                </div>
            </div>

            <div class="col-md-6">
                <div class="stat-card text-center">

                    <h2 class="fw-bold" style="color:#c92361;">
                        {{ $totalKategori }}
                    </h2>

                    <p class="mb-0 fw-bold">
                        Kategori Produk
                    </p>

                </div>
            </div>

        </div>

    </div>
</section>


{{-- PRODUK PILIHAN --}}
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">

            <span class="badge-category">
                Koleksi Kami
            </span>

            <h2 class="section-title mt-3">
                Produk Pilihan Taliwarna
            </h2>

            <p class="text-muted">
                Karya rajutan handmade yang cantik dan penuh kreativitas.
            </p>

        </div>

        <div class="row g-4">

            @php
                $adaProduk = false;
            @endphp

            @foreach($produk as $item)

                @php
                    $nama = strtolower($item->nama_produk);

                    if (str_contains($nama, 'tas')) {
                        $gambar = 'tas_rajut.png';

                    } elseif (str_contains($nama, 'dompet')) {
                        $gambar = 'dompet-rajut.jpg';

                    } elseif (str_contains($nama, 'boneka')) {
                        $gambar = 'boneka-rajut.png';

                    } elseif (str_contains($nama, 'buket')) {
                        $gambar = 'buket-rajut.jpeg';

                    } elseif (str_contains($nama, 'gantungan')) {
                        $gambar = 'gantungan-rajut.jpg';

                    } elseif (str_contains($nama, 'phone pouch')) {
                        $gambar = 'phone-pouch.jpg';

                    } else {
                        $gambar = null;
                    }

                    $fotoAda = $gambar &&
                        file_exists(public_path('images/' . $gambar));
                @endphp

                @if($fotoAda)

                    @php
                        $adaProduk = true;
                    @endphp

                    <div class="col-6 col-md-4 col-lg-3">

                        <div class="home-product-card">

                            {{-- FOTO PRODUK --}}
                            <div class="home-image-wrapper">

                                <img
                                    src="{{ asset('images/' . $gambar) }}"
                                    alt="{{ $item->nama_produk }}"
                                    class="home-product-image"
                                    loading="lazy">

                            </div>

                            {{-- INFORMASI PRODUK --}}
                            <div class="p-3">

                                <span class="badge-category">
                                    {{ $item->kategori->nama_kategori ?? 'Handmade' }}
                                </span>

                                <h6 class="fw-bold mt-3 home-product-name">
                                    {{ $item->nama_produk }}
                                </h6>

                                <p class="home-product-price mb-2">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </p>

                                <p class="text-secondary small mb-3">
                                    Stok: {{ $item->stok }}
                                </p>

                                <a
                                    href="{{ route('produk.detail', $item->id) }}"
                                    class="btn btn-pink btn-sm w-100">

                                    Detail Produk →

                                </a>

                            </div>

                        </div>

                    </div>

                @endif

            @endforeach

            {{-- JIKA BELUM ADA FOTO PRODUK --}}
            @if(!$adaProduk)

                <div class="col-12 text-center py-5">

                    <h5 class="fw-bold">
                        Belum ada produk tersedia.
                    </h5>

                    <p class="text-secondary">
                        Silakan tambahkan foto produk terlebih dahulu.
                    </p>

                </div>

            @endif

        </div>

        {{-- LIHAT SEMUA PRODUK --}}
        <div class="text-center mt-5">

            <a href="{{ route('produk.index') }}"
               class="btn-outline-pink">

                Lihat Semua Produk →

            </a>

        </div>

    </div>
</section>


{{-- TENTANG KAMI --}}
<section id="tentang"
         class="about-section py-5"
         style="scroll-margin-top:100px;">

    <div class="container">

        <div class="row align-items-center g-4">

            <div class="col-lg-5 text-center">

                <div class="about-icon">
                    🧶
                </div>

                <h3 class="fw-bold" style="color:#c92361;">
                    Taliwarna Kreatif
                </h3>

                <p class="fw-bold">
                    Handmade with Love ♡
                </p>

            </div>

            <div class="col-lg-7">

                <span class="badge-category">
                    Tentang Kami
                </span>

                <h2 class="section-title mt-3">
                    Setiap Rajutan Punya Cerita
                </h2>

                <p>
                    PT Taliwarna Kreatif merupakan usaha yang bergerak
                    di bidang kerajinan rajut handmade. Kami menghadirkan
                    berbagai produk kreatif seperti tas rajut, dompet,
                    boneka, aksesoris, dan souvenir.
                </p>

                <p>
                    Setiap produk dibuat dengan kreativitas dan ketelitian
                    untuk menghasilkan karya yang unik dan bernilai.
                </p>

                <a href="{{ route('produk.index') }}"
                   class="btn-pink">

                    Lihat Produk Kami →

                </a>

            </div>

        </div>

    </div>
</section>


{{-- AJAKAN --}}
<section class="py-5 text-center">
    <div class="container">

        <h2 class="section-title">
            Temukan Karya Rajut Favoritmu!
        </h2>

        <p class="text-muted">
            Pilih koleksi handmade yang sesuai dengan gaya dan kebutuhanmu.
        </p>

        <a href="{{ route('produk.index') }}"
           class="btn-pink">

            Jelajahi Produk →

        </a>

    </div>
</section>

@endsection
