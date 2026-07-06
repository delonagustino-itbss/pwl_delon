<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Kelas; // Tambahkan ini untuk mengambil daftar kelas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk mengamankan database transaction

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('krs.index', [
            'krs' => KRS::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data kelas beserta relasi matakuliah untuk ditampilkan di select option form KRS
        $daftar_kelas = Kelas::with('matakuliah')->get();

        return view('krs.create', compact('daftar_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi inputan form terlebih dahulu agar aman
        $request->validate([
            'kode_mahasiswa' => 'required',
            'tahun_ajaran'   => 'required',
            'semester'       => 'required',
            'status'         => 'required',
            'total_sks'      => 'required',
            'kelas_id'       => 'required|array', // Memastikan kelas yang dipilih berbentuk array
        ]);

        // Gunakan DB::transaction agar jika salah satu simpanan error, data tidak setengah masuk
        DB::beginTransaction();

        try {
            // 2. Simpan data utama ke tabel KRS
            $krs = KRS::create([
                'kode_mahasiswa' => $request->kode_mahasiswa,
                'tahun_ajaran'   => $request->tahun_ajaran,
                'semester'       => $request->semester,
                'status'         => $request->status,
                'total_sks'      => $request->total_sks,
            ]);

            // 3. Simpan data kelas yang diambil ke tabel KRS Detail (Relasi many-to-many atau one-to-many)
            // Asumsi: Model KRS kamu memiliki relasi bernama 'detail' ke model KRSDetail atau sejenisnya
            foreach ($request->kelas_id as $id_kelas) {
                $krs->detail()->create([
                    'kelas_id' => $id_kelas
                ]);
            }

            DB::commit(); // Amankan penyimpanan data jika semua proses sukses

            return redirect()->action([KRSController::class, 'index'])->with('success', 'KRS berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan semua simpanan jika ada error di tengah jalan
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('krs.show', [
            'krs' => KRS::where('id', '=', $id)->with(['detail', 'mahasiswa',
                'detail.kelas', 'detail.kelas.dosen', 'detail.kelas.matakuliah'])->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KRS $kRS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KRS $kRS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KRS $kRS)
    {
        //
    }
}