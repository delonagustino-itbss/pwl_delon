<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Website Kampus ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            /* Latar belakang gradasi hijau gelap melingkar sesuai gambar referensi */
            background: radial-gradient(circle at center, #2d442c 0%, #162214 100%) !important;
            font-family: 'Poppins', sans-serif;
        }

        /* Kontainer Pembungkus Tengah */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        /* Kartu Kaca Transparan (Glassmorphism) */
        .glass-card {
            position: relative;
            width: 100%;
            max-width: 450px;
            padding: 60px 35px 35px 35px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* Efek garis berkilau diagonal pada kaca */
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

        /* Lingkaran Avatar Pengguna di Atas Kartu */
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

        /* Judul Login */
        .glass-title {
            color: #ffffff;
            text-align: center;
            font-weight: 500;
            margin-bottom: 35px;
            font-size: 24px;
            letter-spacing: 0.5px;
        }

        /* Form Label */
        .form-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 8px;
        }

        /* Desain Input Minimalis Elegan */
        .form-control {
            width: 100%;
            padding: 12px 15px;
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

        /* Tombol Login Utama (Hijau Tua Pekat) */
        .btn-custom-dark {
            background: #192513;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .btn-custom-dark:hover {
            background: #24351b;
            color: #ffffff;
        }

        /* Tombol Reset (Transparan Kaca) */
        .btn-custom-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 12px;
            font-size: 15px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .btn-custom-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        /* Link teks pendaftaran di bawah form */
        .register-link-box {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }

        .register-link-box a {
            color: #8edba3;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .register-link-box a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Pembatas Garis */
        hr {
            border-color: rgba(255, 255, 255, 0.2);
            margin: 25px 0;
        }

        /* Footer Kaca Redup */
        footer {
            background: rgba(15, 23, 13, 0.7) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.6);
            padding: 25px 0;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="main-content">
    <div class="glass-card">
        <div class="avatar-box">
            <svg viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
        </div>

        <h2 class="glass-title">Login User</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" autocomplete="off" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <div class="row g-3">
                <div class="col-6">
                    <button type="reset" class="btn btn-custom-secondary w-100">Reset</button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-custom-dark w-100">Login</button>
                </div>
            </div>
        </form>

        <hr>

        <div class="text-center register-link-box">
            Belum punya akun? <a href="{{ route('register.view') }}">Register</a>
        </div>
    </div>
</div>

<footer>
    <div class="container text-center">
        <p class="mb-0">
            Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>