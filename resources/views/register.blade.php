<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            /* Latar belakang gradasi melingkar hijau botol gelap */
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

        /* Kontainer Konten Tengah */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        /* Kartu Kaca Transparan (Glassmorphism) */
        .glass-card {
            position: relative;
            width: 100%;
            max-width: 500px;
            padding: 60px 35px 35px 35px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* Garis kilau diagonal pada kartu kaca */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(115deg, transparent 40%, rgba(255, 255, 255, 0.08) 48%, rgba(255, 255, 255, 0.12) 50%, transparent 55%);
            pointer-events: none;
            border-radius: 25px;
        }

        /* Lingkaran Avatar Ikon di Atas Kartu */
        .avatar-box {
            position: absolute;
            top: -45px;
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: 90px;
            background: #192513;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .avatar-box svg {
            width: 40px;
            height: 40px;
            fill: none;
            stroke: #ffffff;
            stroke-width: 1.5;
        }

        /* Judul Kartu */
        .glass-title {
            color: #ffffff;
            text-align: center;
            font-weight: 500;
            margin-bottom: 35px;
            font-size: 24px;
            letter-spacing: 0.5px;
        }

        /* Label Form input */
        .form-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin-bottom: 8px;
        }

        /* Input Text Field Bergaya Minimalis */
        .form-control {
            width: 100%;
            padding: 11px 15px;
            border: none;
            border-radius: 8px;
            background-color: #e9e9e9 !important;
            color: #333333 !important;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: #ffffff !important;
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.5);
        }

        /* Tombol Utama Registrasi (Hijau Pekat) */
        .btn-custom-dark {
            background: #192513;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.5px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .btn-custom-dark:hover {
            background: #24351b;
            color: #ffffff;
        }

        /* Pembatas Garis */
        hr {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 25px 0;
        }

        /* Box Tautan Pindah ke Login */
        .login-link-box {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }

        .login-link-box a {
            color: #8edba3;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .login-link-box a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Footer Kaca Gelap Terintegrasi */
        footer {
            background: rgba(15, 23, 13, 0.7) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.6);
            padding: 30px 0;
            font-size: 14px;
            margin-top: auto;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/ITB-SS.jpg') }}" width="70">
        </a>
        <div class="ms-auto">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark me-2 px-4">
                Home
            </a>
            <a href="{{ route('login') }}" class="btn btn-success px-4" style="background-color: #24351b; border: 1px solid rgba(255,255,255,0.1);">
                Login
            </a>
        </div>
    </div>
</nav>

<div class="main-content">
    <div class="glass-card">
        <div class="avatar-box">
            <svg viewBox="0 0 24 24">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                <circle cx="8.5" cy="7" r="4" />
                <line x1="20" y1="8" x2="20" y2="14" />
                <line x1="23" y1="11" x2="17" y2="11" />
            </svg>
        </div>

        <h3 class="glass-title">Register Akun</h3>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" autocomplete="off" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" autocomplete="off" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-custom-dark w-100">
                Register
            </button>
        </form>

        <hr>

        <p class="text-center login-link-box mb-0">
            Sudah mempunyai akun? <a href="{{ route('login') }}">Login disini</a>
        </p>
    </div>
</div>

<footer>
    <div class="container text-center">
        <img src="{{ asset('images/logo-white.png') }}" width="220" style="filter: brightness(0) invert(1); margin-bottom: 10px;">
        <p class="mb-0">
            Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>