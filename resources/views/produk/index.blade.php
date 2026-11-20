
@extends('layouts.app')

@section('title', 'Katalog Produk - Taliwarna Kreatif')

@section('content')

<style>
    .catalog-section {
        background: #fff8f3;
        min-height: 600px;
    }

    .catalog-header {
        padding: 25px 0;
    }

    .catalog-card {
        background: white;
        border: none;
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 5px 20px rgba(113, 59, 67, 0.08);
        transition: 0.3s;
    }

    .catalog-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 28px rgba(113, 59, 67, 0.15);
    }

    .catalog-image-wrapper {
        width: 100%;
        height: 230px;
        overflow: hidden;
        background: #ffe8ef;
    }

    .catalog-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .catalog-name {
        color: #713b43;
        min-height: 45px;
    }

    .catalog-price {
        color: #c92361;
        font-weight: 800;
        font-size: 18px;
    }

    .search-box {
        border: 1px solid #f5c7d7;
        background: white;
    }

    .search-box:focus {
        border-color: #ec4b83;
        box-shadow: 0 0 0 0.2rem rgba(236, 75, 131, 0.12);
    }

    .empty-catalog {
        background: white;
        border-radius: 20px;
        padding: 50px 20px;
    }
</style>

<section class="catalog-section py-5">
    <div class="container">

        <!-- JUDUL -->
        <div class="text-center catalog-header mb-4">

            <span class="badge-category">
                Our Handmade Collection
            </span>

            <h2 class="section-title mt-3">
                Katalog Produk
            </h2>

            <p class="text-secondary">
                Temukan koleksi rajutan favoritmu.
                Setiap produk dibuat dengan penuh cinta.
            </p>

            <div class="mt-3">
                <span class="badge-category">
                    Koleksi Handmade
                </span>
            </div>

        </div>

        <!-- SEARCH DAN FILTER -->
        <form action="{{ route('produk.index') }}"
              method="GET"
              class="row g-3 mb-5">

            <div class="col-md-6">
                <input
                    type="text"
                    name="search"
                    class="form-control rounded-pill p-3 search-box"
                    placeholder="Cari nama produk..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-4">
                <select
                    name="kategori"
                    class="form-select rounded-pill p-3 search-box">

                    <option value="">Semua Kategori</option>

                    @foreach($kategori as $kat)
                        <option
                            value="{{ $kat->id }}"
                            {{ request('kategori') == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-pink w-100 p-3">
                    Cari Produk
                </button>
            </div>

        </form>

        <!-- DAFTAR PRODUK -->
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

                        <div class="catalog-card">

                            <!-- FOTO PRODUK -->
                            <div class="catalog-image-wrapper">

                                <img
                                    src="{{ asset('images/' . $gambar) }}"
                                    alt="{{ $item->nama_produk }}"
                                    class="catalog-image">

                            </div>

                            <!-- INFORMASI PRODUK -->
                            <div class="p-3">

                                <span class="badge-category">
                                    {{ $item->kategori->nama_kategori ?? 'Handmade' }}
                                </span>

                                <h6 class="fw-bold mt-3 catalog-name">
                                    {{ $item->nama_produk }}
                                </h6>

                                <p class="catalog-price mb-2">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </p>

                                <p class="text-secondary small mb-3">
                                    Stok: {{ $item->stok }}
                                </p>

                                <a
                                    href="{{ route('produk.detail', $item->id) }}"
                                    class="btn btn-pink btn-sm w-100">

                                    Lihat Detail

                                </a>

                            </div>

                        </div>

                    </div>

                @endif

            @endforeach

            <!-- JIKA SEMUA PRODUK TIDAK MEMILIKI FOTO -->
            @if(!$adaProduk)

                <div class="col-12">
                    <div class="empty-catalog text-center">

                        <h5 class="fw-bold">
                            Produk belum tersedia
                        </h5>

                        <p class="text-secondary">
                            Belum ada produk dengan foto yang tersedia.
                        </p>

                    </div>
                </div>

            @endif

        </div>

        <!-- PAGINATION -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $produk->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>

@endsection
