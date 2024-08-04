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
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('no_tiket');
            $table->string('jenis_pengajuan'); // 'akta_kelahiran', 'akta_kematian', 'kehilangan_kk', 'pindah_datang', 'pindah_keluar'
            $table->string('status')->default(\App\Enums\StatusPengajuan::Proses); //  'default:proses', 'disetujui', 'ditolak'
            $table->timestamp('tgl_verifikasi')->nullable();
            $table->text('catatan')->nullable();
            $table->text('alamat_tujuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrasis');
    }
};
