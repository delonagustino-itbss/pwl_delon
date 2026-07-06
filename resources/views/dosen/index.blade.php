<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Academic ITBSS - Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            font-family: 'Poppins', sans-serif;
            position: relative;
            background-color: #1e2d1b; 
            overflow-x: hidden;
        }

        /* Latar belakang proyek */
        .bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('images/bg.jpg') }}") no-repeat center center;
            background-size: cover;
            filter: blur(2px) brightness(0.8) saturate(1.1);
            transform: scale(1.02);
            z-index: -2;
        }

        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 15, 10, 0.15);
            z-index: -1;
        }

        /* Navbar Utama */
        .navbar {
            padding: 15px 0;
            background: rgba(255, 255, 255, 0.08) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            z-index: 9999 !important; 
        }

        .navbar .nav-link, .navbar .navbar-brand {
            color: #ffffff !important;
            font-weight: 500;
        }

        /* Menu Dropdown Putih Terang (Light Glass) */
        .navbar .dropdown-menu {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            z-index: 10000 !important;
            padding: 8px 0;
        }

        .navbar .dropdown-item {
            color: #1e2d1b !important;
            font-weight: 500;
            font-size: 14px;
            padding: 10px 20px;
            transition: all 0.2s;
        }

        .navbar .dropdown-item:hover {
            background-color: rgba(46, 125, 50, 0.15) !important;
            color: #1b5e20 !important;
        }

        .navbar .dropdown-item.active {
            background-color: #2e7d32 !important;
            color: #ffffff !important;
        }

        /* Panel Kaca Utama Wadah Luar */
        .glass-panel {
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 28px;
            padding: 40px;
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.25);
            color: #ffffff;
            z-index: 1; 
        }

        .page-title {
            font-weight: 600;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        /* =======================================================
           EFEK TRANSPARANSI PREMIUM iOS WIDGET
           ======================================================= */
        .ios-table-container {
            display: flex;
            flex-direction: column;
            gap: 12px; 
            margin-top: 20px;
        }

        /* Baris Header */
        .ios-header-row {
            display: grid;
            grid-template-columns: 50px 2fr 1.5fr 1.5fr 1.5fr 1.2fr 2fr 2fr 1.8fr; 
            gap: 10px;
            padding: 0 10px;
        }

        .ios-th {
            color: #8edba3;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1px;
            text-align: center;
            padding: 10px 5px;
        }

        /* Baris Data Utama */
        .ios-data-row {
            display: grid;
            grid-template-columns: 50px 2fr 1.5fr 1.5fr 1.5fr 1.2fr 2fr 2fr 1.8fr;
            gap: 10px; 
            align-items: stretch;
        }

        /* SEL KACA INDIVIDU DENGAN TRANSPARANSI ULTRA iOS MURNI */
        .ios-td {
            background: rgba(255, 255, 255, 0.55) !important;
            backdrop-filter: blur(30px) saturate(1.8);
            -webkit-backdrop-filter: blur(30px) saturate(1.8);
            
            border-radius: 16px;
            
            border-top: 1.5px solid rgba(255, 255, 255, 0.65) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
            border-left: 1px solid rgba(255, 255, 255, 0.35) !important;
            border-right: 1px solid rgba(255, 255, 255, 0.35) !important;
            
            padding: 16px 12px;
            color: #000000 !important; 
            font-size: 13.5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            word-break: break-word;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ios-td.center {
            justify-content: center;
            text-align: center;
        }

        /* Efek Hover baris */
        .ios-data-row:hover .ios-td {
            background: rgba(255, 255, 255, 0.70) !important;
            border-top-color: rgba(255, 255, 255, 0.9) !important;
            transform: scale(1.005);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Desain Tombol */
        .btn-create {
            background-color: #192513;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-create:hover {
            background-color: #24351b;
            box-shadow: 0 0 15px rgba(255,255,255,0.25);
        }

        .btn-action-edit {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 6px 14px;
            font-size: 12.5px;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }
        .btn-action-edit:hover { background-color: #1b5e20; color: white; }

        .btn-action-delete {
            background-color: #c62828;
            color: white;
            border: none;
            padding: 6px 14px;
            font-size: 12.5px;
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-action-delete:hover { background-color: #b71c1c; color: white; }

        /* Footer */
        footer {
            background: rgba(12, 19, 10, 0.85) !important;
            backdrop-filter: blur(15px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.65);
        }
        footer h5 { color: #8edba3 !important; font-weight: 600; }
    </style>
</head>

<body>

<div class="bg-container"></div>
<div class="bg-overlay"></div>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('images/LOGO-ITBSSs.png') }}" alt="Logo Itbss" width="35" class="me-2">
            <span>ITBSS</span>
        </a>
        <button class="navbar-toggler border-white-50" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Menu
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item active" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">Kelas</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Jurusan</a></li>
                        <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="main-content my-4">
    <div class="container-fluid px-5">
        <div class="glass-panel">
            
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <h1 class="page-title mb-0">Table Data Dosen</h1>
                <a href="{{ action([App\Http\Controllers\DosenController::class, 'create']) }}">
                    <button type="button" class="btn btn-create">Data Baru (Create)</button>
                </a>
            </div>

            <div class="ios-table-container">
                
                <div class="ios-header-row">
                    <div class="ios-th">No</div>
                    <div class="ios-th">Nama Lengkap</div>
                    <div class="ios-th">NIP</div>
                    <div class="ios-th">NIDN</div>
                    <div class="ios-th">Pendidikan</div>
                    <div class="ios-th">Jurusan</div>
                    <div class="ios-th">Tempat/Tgl Lahir</div>
                    <div class="ios-th">Alamat</div>
                    <div class="ios-th">Aksi</div>
                </div>

                @foreach ($dosen as $d)
                <div class="ios-data-row">
                    <div class="ios-td center fw-bold">{{ $d->id }}</div>
                    <div class="ios-td fw-semibold">{{ $d->fullname }}</div>
                    <div class="ios-td center">{{ $d->NIP }}</div>
                    <div class="ios-td center">{{ $d->NIDN }}</div>
                    <div class="ios-td center fw-semibold">{{ $d->pendidikan_terakhir }}</div>
                    <div class="ios-td center">{{ $d->jurusan_id }}</div>
                    <div class="ios-td">{{ $d->tempat_lahir }}, {{ $d->tanggal_lahir }}</div>
                    <div class="ios-td">{{ $d->alamat }}</div>
                    <div class="ios-td center">
                        <div class="d-flex gap-2 justify-content-center w-100">
                            <a href="{{ action([App\Http\Controllers\DosenController::class, 'edit'], [$d->id]) }}" class="text-decoration-none">
                                <button type="button" class="btn btn-action-edit">Edit</button>
                            </a>
                            <form action="{{ action([App\Http\Controllers\DosenController::class, 'destroy'], [$d->id]) }}" method="post" class="m-0" onsubmit="return confirm('Hapus data dosen ini?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-action-delete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div> </div>
    </div>
</div>

<footer class="pt-5 pb-4 mt-auto">
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-4 mx-auto mt-3">
                <h5>ITBSS</h5>
                <p class="text-white-50">Sistem Informasi Akademik Terintegrasi Sabda Setia.</p>
            </div>
            <div class="col-md-2 mx-auto mt-3">
                <h5>Menu</h5>
                <p class="mb-1"><a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}" class="text-white-50 text-decoration-none">Mahasiswa</a></p>
                <p class="mb-1"><a href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}" class="text-white-50 text-decoration-none">Dosen</a></p>
                <p class="mb-1"><a href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}" class="text-white-50 text-decoration-none">Jurusan</a></p>
                <p class="mb-1"><a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}" class="text-white-50 text-decoration-none">Mata Kuliah</a></p>
            </div>
        </div>
        <hr class="mb-4" style="border-color: rgba(255,255,255,0.15)">
        <p class="text-center mb-0 text-white-50">© 2026 Copyright: <strong>Institut Teknologi & Bisnis Sabda Setia</strong></p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>