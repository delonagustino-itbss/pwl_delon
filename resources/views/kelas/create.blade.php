<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Mahasiswa - Tambah Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            /* Latar belakang gradasi hijau gelap sesuai gambar contoh */
            background: radial-gradient(circle at center, #2d442c 0%, #162214 100%) !important;
            font-family: 'Poppins', sans-serif;
        }
        
        .navbar {
            padding: 10px; 
            background-color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Container Pembungkus Tengah */
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
            max-width: 650px;
            padding: 60px 40px 40px 40px;
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

        /* Lingkaran Avatar di Bagian Atas Kartu */
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
            width: 45px;
            height: 45px;
            fill: none;
            stroke: #ffffff;
            stroke-width: 1.5;
        }

        /* Styling Judul Halaman */
        .glass-title {
            color: #ffffff;
            text-align: center;
            font-weight: 500;
            margin-bottom: 35px;
            font-size: 24px;
            letter-spacing: 1px;
        }

        /* Tata Letak Tabel di dalam Kaca */
        .glass-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        .glass-table td {
            color: #ffffff;
            vertical-align: middle;
            font-size: 15px;
        }

        /* Pengaturan Lebar Kolom Teks Judul */
        .glass-table td:first-child {
            width: 35%;
            font-weight: 400;
        }

        /* Pengaturan Lebar Kolom Titik Dua */
        .glass-table td:nth-child(2) {
            width: 5%;
            text-align: center;
        }

        /* Input, Select Bergaya Modern Minimalis */
        .glass-table input[type="text"],
        .glass-table select {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 5px;
            background-color: #e9e9e9;
            color: #333333;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        .glass-table input[type="text"]:focus,
        .glass-table select:focus {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        /* Kelompok Tombol */
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        /* Tombol ADD Utama (Hijau Tua) */
        .btn-custom-dark {
            flex: 1;
            background: #192513;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-custom-dark:hover {
            background: #24351b;
            color: #ffffff;
        }

        /* Tombol Clear (Transparan) */
        .btn-custom-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 12px 25px;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-custom-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #ffffff;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
        <li class="nav-item">
            <img src="{{ asset('images/LOGO-ITBSSs.png') }}" alt="Logo Itbss" width="40" height="auto">
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}">Dosen</a></li>
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}">Mahasiswa</a></li>
            <li><a class="dropdown-item active" href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}">Kuliah</a></li>
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}">Jurusan</a></li>
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}">Mata Kuliah</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="main-content">
    <div class="glass-card">
        <div class="avatar-box">
            <svg viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20M4 19.5V3.5A2.5 2.5 0 0 1 6.5 1M20 1v21M6.5 5H19M6.5 9H19" />
            </svg>
        </div>

        <h1 class="glass-title">Tambah Kelas</h1>

        <form action="{{ action([App\Http\Controllers\KelasController::class, 'store']) }}" method="post">
            @csrf
            <table class="glass-table">
                <tr>
                    <td>Kode Kelas</td><td>:</td><td><input type="text" name="kode_kelas" id="kode_kelas" autocomplete="off" required></td>
                </tr>

                <tr>
                    <td>Mata Kuliah</td><td>:</td>
                    <td>
                        <select name="kode_mata_kuliah" id="kode_mata_kuliah" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            @php $matakuliah = \App\Models\MataKuliah::all(); @endphp
                            @foreach($matakuliah as $mk)
                                <option value="{{ $mk->id }}">{{ $mk->nama_mk }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Dosen</td><td>:</td>
                    <td>
                        <select name="kode_dosen" id="kode_dosen" required>
                            <option value="">-- Pilih Dosen --</option>
                            @php $dosen = \App\Models\Dosen::all(); @endphp
                            @foreach($dosen as $d)
                                <option value="{{ $d->id }}">{{ $d->fullname }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Hari</td><td>:</td>
                    <td>
                        <select name="hari" class="form-select" required>
    <option value="">-- Pilih Hari --</option>
    <option value="Senin">Senin</option>
    <option value="Selasa">Selasa</option>
    <option value="Rabu">Rabu</option>
    <option value="Kamis">Kamis</option>
    <option value="Jumat">Jumat</option>
    <option value="Sabtu">Sabtu</option>
</select>
                    </td>
                </tr>

                <tr>
                    <td>Jam</td><td>:</td>
                    <td>
                        <select name="jam" id="jam" required>
                            <option value="">-- Pilih Jam --</option>
                            <option value="08:00 - 09:40">08:00 - 09:40</option>
                            <option value="09:50 - 11:30">09:50 - 11:30</option>
                            <option value="12:30 - 14:10">12:30 - 14:10</option>
                            <option value="17:00 - 18:40">17:00 - 18:40</option>
                            <option value="19:00 - 20:40">19:00 - 20:40</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Tahun Ajaran</td><td>:</td><td><input type="text" name="tahun_ajaran" id="tahun_ajaran" autocomplete="off" required></td>
                </tr>

                <tr>
                    <td>Ruang Kelas</td><td>:</td><td><input type="text" name="ruang_kelas" id="ruang_kelas" autocomplete="off" required></td>
                </tr>

                <tr>
                    <td>Jumlah Mahasiswa</td><td>:</td><td><input type="text" name="jumlah_max" id="jumlah_max" autocomplete="off" required></td>
                </tr>

                <tr>
                    <td></td><td></td>
                    <td>
                        <div class="button-group">
                            <button type="submit" class="btn-custom-dark">ADD</button>
                            <button type="reset" class="btn-custom-secondary">Clear</button>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<footer class="bg-dark text-white pt-5 pb-4 mt-auto">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-info">ITBSS</h5>
                <p>Sistem Informasi Akademik untuk pengelolaan data Mahasiswa, Dosen, Jurusan, dan Mata Kuliah.</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-info">Menu</h5>
                <p><a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}" class="text-white" style="text-decoration: none;">Mahasiswa</a></p>
                <p><a href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}" class="text-white" style="text-decoration: none;">Dosen</a></p>
                <p><a href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}" class="text-white" style="text-decoration: none;">Jurusan</a></p>
                <p><a href="{{ action([App\Http\Controllers\MatakuliahController::class, 'index']) }}" class="text-white" style="text-decoration: none;">Mata Kuliah</a></p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-info">Kontak</h5>
                <p><i class="fas fa-home mr-3"></i> Pontianak, Indonesia</p>
                <p><i class="fas fa-envelope mr-3"></i> admin@itbss.ac.id</p>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
                <p>© 2026 Copyright: <strong>Sistem Akademik</strong></p>
            </div>
        </div>
    </div>
</footer>
</html>