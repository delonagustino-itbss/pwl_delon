<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create KRS</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">

    <div class="container mt-5">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Form Tambah KRS</h4>
        </div>
        <div class="card-body">
          
          <form action="{{ action([App\Http\Controllers\KRSController::class, 'store']) }}" method="post">
            @csrf
            
            <!-- Bagian Data Utama KRS -->
            <table class="table table-borderless align-middle">
              <tr>
                <td style="width: 200px;">Kode Mahasiswa</td>
                <td style="width: 20px;">:</td>
                <td><input type="text" name="kode_mahasiswa" class="form-control" required></td>
              </tr>
              <tr>
                <td>Tahun Ajaran</td>
                <td>:</td>
                <td><input type="text" name="tahun_ajaran" class="form-control" required></td>
              </tr>
              <tr>
                <td>Semester</td>
                <td>:</td>
                <td><input type="text" name="semester" class="form-control" required></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td><input type="text" name="status" class="form-control" required></td>
              </tr>
              <tr>
                <td>Total SKS</td>
                <td>:</td>
                <td><input type="text" name="total_sks" class="form-control" required></td>
              </tr>
            </table>

            <hr class="my-4">

            <!-- Perbaikan: Mengeluarkan h3 dan div dari dalam table ke struktur yang benar -->
            <h5 class="mb-3 text-secondary">Pilih Kelas yang Diambil (KRS Detail)</h5>
            
            <div id="kelas-container" class="mb-4">
              <div class="kelas-row row align-items-center g-3">
                <div class="col-md-3">
                  <label class="form-label mb-0">Pilih Kelas:</label>
                </div>
                <div class="col-md-9">
                  <select name="kelas_id[]" class="form-select" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($daftar_kelas as $kelas)
                      <!-- Note: Pastikan field 'id' dan nama properti kelas sesuai dengan di database kamu -->
                      <option value="{{ $kelas->id }}">{{ $kelas->nama_matakuliah ?? $kelas->kode_kelas }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex gap-2 justify-content-end">
              <button type="reset" class="btn btn-secondary">Clear</button>
              <button type="submit" class="btn btn-success">Save KRS</button>
            </div>

          </form>

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>