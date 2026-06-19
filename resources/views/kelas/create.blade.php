<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            padding: 10px; 
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
            <img src="{{ asset('img/download (4).png') }}" alt="Logo Itbss" width="40" height="auto">
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
            <li><a class="dropdown-item" href="{{ action([App\Http\Controllers\MataKuliahController::class, 'index']) }}">Mata Kuliah</a></li>
          </ul>
        </li>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

    <h1 class="text-center p-3">Tambah Kelas</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <form class="form mb-3" action="{{ action([App\Http\Controllers\KelasController::class, 'store']) }}" method="post">
      @csrf
        <table>
            <tr>
                <td>Kode Kelas</td><td>:</td><td><input type="text" name="kode_kelas" id="kode_kelas" required></td>
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
                    <select name="hari" id="hari" required>
                        <option value="">-- Pilih Hari --</option>
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
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
                <td>Tahun Ajaran</td><td>:</td><td><input type="text" name="tahun_ajaran" id="tahun_ajaran" required></td>
            </tr>

            <tr>
                <td>Ruang Kelas</td><td>:</td><td><input type="text" name="ruang_kelas" id="ruang_kelas" required></td>
            </tr>

            <tr>
                <td>Jumlah Mahasiswa</td><td>:</td><td><input type="text" name="jumlah_max" id="jumlah_max" required></td>
            </tr>

            <tr>
                <td>
                    <button type="submit" class="btn btn-primary btn-lg" class="button">Add</button>
                    <button type="reset" class="btn btn-secondary btn-lg" class="button">Clear</button>
                </td>
            </tr>
        </table>
    </form>
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
                <p><a href="{{ action([App\Http\Controllers\MataKuliahController::class, 'index']) }}" class="text-white" style="text-decoration: none;">Mata Kuliah</a></p>
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