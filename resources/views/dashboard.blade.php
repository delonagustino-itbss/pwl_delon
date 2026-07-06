<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Kampus ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            /* Latar belakang gradasi hijau botol gelap melingkar */
            background: radial-gradient(circle at center, #2d442c 0%, #162214 100%) !important;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
        }

        /* Navbar Glassmorphism Terang */
        .navbar {
            padding: 12px 0;
            background-color: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .navbar-nav .nav-link {
            color: #333333 !important;
            font-weight: 500;
        }

        .navbar-nav .nav-link.active {
            color: #1e351c !important;
            font-weight: 700;
        }

        .dropdown-toggle {
            border-radius: 30px;
            font-weight: 600;
            padding: 8px 18px;
        }

        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,.15);
        }

        /* Kartu Kaca Transparan (Glassmorphism) */
        .glass-card {
            position: relative;
            padding: 35px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        /* Garis kilau diagonal pada kartu kaca */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(115deg, transparent 45%, rgba(255, 255, 255, 0.08) 48%, rgba(255, 255, 255, 0.12) 50%, transparent 55%);
            pointer-events: none;
            border-radius: 20px;
        }

        /* Styling teks ucapan selamat datang */
        .welcome-card h2 {
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #ffffff;
        }

        .welcome-card p {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.85);
        }

        /* Pengaturan gambar banner agar pas di dalam tema */
        .kampus-img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 15px;
            display: block;
            margin: auto;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Link Lokasi didalam Glassmorphism */
        .location-card h3 {
            font-weight: 500;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .location-link {
            color: #8edba3 !important;
            transition: color 0.3s ease;
            font-size: 15px;
        }

        .location-link:hover {
            color: #ffffff !important;
        }

        /* Footer Kaca Gelap */
        footer {
            background: rgba(15, 23, 13, 0.7) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: white;
            margin-top: auto;
            padding: 40px 0;
        }

        .footer-text {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/ITB-SS.jpg') }}" width="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Home</a>
                </li>

                @auth
                    @if(auth()->user()->role != 'guest')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Menu
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class,'index']) }}">Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class,'index']) }}">Dosen</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class,'index']) }}">Jurusan</a></li>
                                <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class,'index']) }}">Mata Kuliah</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(auth()->user()->role == 'mahasiswa')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action([App\Http\Controllers\KelasController::class,'index']) }}">Kelas</a>
                        </li>
                    @endif
                @endauth
            </ul>

            @auth
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-success me-2 px-4" style="background-color: #24351b; border: 1px solid rgba(255,255,255,0.1);">Login</a>
                <a href="{{ route('register.view') }}" class="btn btn-outline-dark px-4">Register</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container my-5 flex-grow-1">

    <div class="glass-card welcome-card text-center mb-5">
        @auth
            <h2>Selamat Datang, {{ auth()->user()->name }}</h2>
            <p class="mb-0">Anda masuk sebagai sistem ruang lingkup <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>
        @else
            <h2>Selamat Datang di Website Kampus ITBSS</h2>
            <p class="mb-0">
                Website resmi Institut Teknologi & Bisnis Sabda Setia.<br>
                Silakan login terlebih dahulu untuk mengakses fungsionalitas Sistem Informasi Akademik secara penuh.
            </p>
        @endauth
    </div>

    <div class="row g-4">
        <div class="col-md-12">
            <img src="{{ asset('images/Website-PMB-26-27.jpg') }}" class="kampus-img">
        </div>
        <div class="col-md-12">
            <img src="{{ asset('images/Gedung-ITBSS-scaled.jpg') }}" class="kampus-img">
        </div>
    </div>

    <div class="glass-card location-card mt-5">
        <h3>Campus Location</h3>
        <p class="mb-0">
            <a href="http://maps.google.com/?q=Jl.+Purnama+II,+Pontianak" target="_blank" class="text-decoration-none location-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg>
                Jl. Purnama II, Pontianak Selatan, Kota Pontianak, Kalimantan Barat
            </a>
        </p>
    </div>
</div>

<footer>
    <div class="container text-center">
        <img src="{{ asset('images/Logo-ITBSS.png') }}" width="220" style="filter: brightness(0) invert(1);">
        <p class="footer-text mt-3 mb-0">
            Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>