
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Taliwarna Kreatif')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #ec4b83;
            --pink-dark: #c92361;
            --pink-light: #ffe0eb;
            --cream: #fff8f3;
            --brown: #713b43;
            --text: #563b40;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--cream);
            color: var(--text);
            margin: 0;
        }

        /* Welcome Bar */
        .welcome-bar {
            background: var(--pink-dark);
            color: white;
            text-align: center;
            padding: 9px 15px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.97);
            padding: 15px 0;
            box-shadow: 0 3px 18px rgba(113, 59, 67, 0.07);
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff0f5;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(236, 75, 131, 0.15);
            flex-shrink: 0;
        }

        .logo-icon svg {
            width: 55px;
            height: 55px;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            color: var(--pink-dark);
            font-size: 25px;
            font-weight: 800;
            line-height: 1.1;
        }

        .brand-subtitle {
            color: var(--brown);
            font-size: 10px;
            letter-spacing: 3px;
            font-weight: 800;
            margin-top: 4px;
        }

        .navbar-nav {
            gap: 10px;
        }

        .nav-link {
            color: var(--brown) !important;
            font-weight: 700;
            padding: 10px 15px !important;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--pink) !important;
        }

        .navbar-toggler {
            border-color: var(--pink-light);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.2rem rgba(236, 75, 131, 0.2);
        }

        /* Buttons */
        .btn-pink {
            background: var(--pink);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 11px 25px;
            font-weight: 800;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-pink:hover {
            background: var(--pink-dark);
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-pink {
            border: 2px solid var(--pink);
            color: var(--pink);
            border-radius: 30px;
            padding: 9px 22px;
            font-weight: 800;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-outline-pink:hover {
            background: var(--pink);
            color: white;
        }

        /* Section */
        .section-title {
            font-family: 'Playfair Display', serif;
            color: var(--brown);
            font-size: 34px;
            font-weight: 800;
        }

        .section-subtitle {
            color: #98777d;
            font-size: 15px;
        }

        /* Product Card */
        .product-card {
            background: white;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 5px 20px rgba(113, 59, 67, 0.07);
            transition: 0.3s;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(113, 59, 67, 0.13);
        }

        .product-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: var(--pink-light);
        }

        .badge-category {
            display: inline-block;
            background: var(--pink-light);
            color: var(--pink-dark);
            border-radius: 20px;
            padding: 5px 12px;
            font-size: 11px;
            font-weight: 800;
        }

        .price {
            color: var(--pink-dark);
            font-size: 18px;
            font-weight: 800;
        }

        /* Footer */
        .footer {
            background: #713b43;
            color: white;
            padding: 55px 0 20px;
            margin-top: 70px;
        }

        .footer-title {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .footer p {
            color: #f8dfe5;
            line-height: 1.8;
        }

        .footer a {
            color: #f8dfe5;
            text-decoration: none;
            display: block;
            margin-bottom: 9px;
        }

        .footer a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.2);
            margin-top: 30px;
            padding-top: 18px;
            text-align: center;
            color: #f8dfe5;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .brand-name {
                font-size: 21px;
            }

            .logo-icon,
            .logo-icon svg {
                width: 45px;
                height: 45px;
            }

            .section-title {
                font-size: 28px;
            }

            .navbar-nav {
                padding-top: 15px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- Welcome Bar -->
    <div class="welcome-bar">
        ♡ SELAMAT DATANG DI TALIWARNA KREATIF — HANDMADE WITH LOVE ♡
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <!-- Logo Taliwarna Kreatif -->
            <a href="{{ route('home') }}" class="brand-logo">

                <div class="logo-icon">
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="43" fill="#ffe0eb"/>

                        <path d="M25 52 C25 25 72 25 75 50 C78 75 30 82 25 52"
                              fill="none"
                              stroke="#ec4b83"
                              stroke-width="6"
                              stroke-linecap="round"/>

                        <path d="M30 38 C45 65 65 65 72 39"
                              fill="none"
                              stroke="#c92361"
                              stroke-width="5"
                              stroke-linecap="round"/>

                        <path d="M27 57 C42 38 60 35 74 58"
                              fill="none"
                              stroke="#ec4b83"
                              stroke-width="5"
                              stroke-linecap="round"/>

                        <path d="M50 10 C47 2 57 0 61 8"
                              fill="none"
                              stroke="#713b43"
                              stroke-width="3"
                              stroke-linecap="round"/>

                        <path d="M72 75 L88 89"
                              fill="none"
                              stroke="#713b43"
                              stroke-width="4"
                              stroke-linecap="round"/>

                        <path d="M84 85 L91 92"
                              fill="none"
                              stroke="#ec4b83"
                              stroke-width="4"
                              stroke-linecap="round"/>

                        <path d="M42 43 C47 35 55 35 59 43"
                              fill="none"
                              stroke="#fff8f3"
                              stroke-width="3"
                              stroke-linecap="round"/>
                    </svg>
                </div>

                <div>
                    <div class="brand-name">Taliwarna</div>
                    <div class="brand-subtitle">KREATIF ♡</div>
                </div>

            </a>

            <!-- Toggle Mobile -->
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Buka navigasi">

                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                           href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}"
                           href="{{ route('produk.index') }}">
                            Katalog
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('produk.index') }}" class="btn-pink">
                            Lihat Produk ♡
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">

            <div class="row g-4">

                <div class="col-md-5">
                    <div class="footer-title">
                        Taliwarna Kreatif ♡
                    </div>

                    <p>
                        Taliwarna Kreatif menghadirkan berbagai produk
                        rajutan handmade yang dibuat dengan penuh ketelitian,
                        kreativitas, dan cinta.
                    </p>
                </div>

                <div class="col-md-3">
                    <h5 class="fw-bold mb-3">Navigasi</h5>

                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('produk.index') }}">Katalog Produk</a>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Hubungi Kami</h5>

                    <p>
                        Temukan produk rajutan favoritmu dan
                        jadikan setiap momen lebih berwarna.
                    </p>

                    <p>♡ Handmade with Love</p>
                </div>

            </div>

            <div class="footer-bottom">
                © {{ date('Y') }} Taliwarna Kreatif.
                All Rights Reserved.
            </div>

        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>
