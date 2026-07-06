<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas');

            $table->integer('kode_mata_kuliah');
            $table->integer('kode_dosen');

            // PERBAIKAN: Ubah jadi string biasa tanpa array pembatas agar bebas error
            $table->string('hari');
            $table->string('jam');

            $table->string('tahun_ajaran');
            $table->string('ruang_kelas');

            $table->integer('jumlah_max');
            $table->integer('jumlah_mahasiswa')->default(0);
            
            // Sudah aman nullable
            $table->integer('semester')->nullable();

            $table->timestamps();

            // Aturan Unique Constraints
            $table->unique([
                'kode_dosen',
                'hari',
                'jam',
                'tahun_ajaran',
                'semester'
            ]);

            $table->unique([
                'ruang_kelas',
                'hari',
                'jam',
                'tahun_ajaran',
                'semester'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};