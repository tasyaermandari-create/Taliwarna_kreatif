
@php
    $nama = strtolower($item->nama_produk ?? '');

    if (str_contains($nama, 'tas')) {
        $gambar = 'tas-rajut.jpg';
    } elseif (str_contains($nama, 'dompet')) {
        $gambar = 'dompet-rajut.jpg';
    } elseif (str_contains($nama, 'boneka')) {
        $gambar = 'boneka-rajut.jpg';
    } elseif (str_contains($nama, 'buket')) {
        $gambar = 'buket-rajut.jpg';
    } elseif (str_contains($nama, 'gantungan')) {
        $gambar = 'gantungan-rajut.jpg';
    } elseif (str_contains($nama, 'phone pouch')) {
        $gambar = 'phone-pouch.jpg';
    } else {
        $gambar = 'tas-rajut.jpg';
    }
@endphp

<img
    src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/' . $gambar) }}"
    alt="{{ $item->nama_produk }}"
    class="product-image"
    onerror="this.onerror=null;this.src='{{ asset('images/' . $gambar) }}';"
>
