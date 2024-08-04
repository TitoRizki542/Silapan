<?php

namespace App\Http\Controllers\Admin;

use App\Enums\JenisPengajuan;
use App\Models\Syarat;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministrasiController extends Controller
{
    public function administrasi()
    {
        $query = Administrasi::query();

        if (request()->filled('status')) {
            $status = request()->input('status');

            $query->where('status', $status);
        }

        if (request()->filled('jenis_pengajuan')) {
            $pengajuan = request()->input('jenis_pengajuan');

            $query->where('jenis_pengajuan', $pengajuan);
        }

        $administrasis = $query->get();

        $jenisPengajuan = JenisPengajuan::cases();

        return view('dashboard.administrasi.index', compact('administrasis', 'jenisPengajuan'));
    }

    public function detailAdministrasi($tiket)
    {
        $administrasi = Administrasi::whereNoTiket($tiket)->first();
        $syarats = Syarat::where('administrasi_id', $administrasi->id)->get();

        // return view('dashboard.administrasi.detail', compact('administrasi', 'syarats'));
        return view('dashboard.administrasi.detail', compact('administrasi', 'syarats'));
    }


    public function konfirmasiAdministrasi(Request $request, $tiket)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:berhasil,ditolak'],
            'catatan' => ['required']
        ]);

        $validated['tgl_verifikasi'] = now();

        $administrasi = Administrasi::whereNoTiket($tiket)->first();
        $administrasi->fill($validated);
        $administrasi->save();

        return to_route('admin.administrasi.detail', $tiket);
    }

    public function openpdf($id)
    {
        $syarat = Syarat::find($id);

        // Dapatkan path absolut dari file
        $path = storage_path('app/public/' . $syarat->berkas);

        // Periksa apakah file ada
        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
        ];

        return response()->file($path, $header);
    }

    public function openExcel($id)
    {
        $syarat = Syarat::find($id);

        // Dapatkan path absolut dari file
        $path = storage_path('app/public/' . $syarat->berkas);

        // Periksa apakah file ada
        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        $header = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . basename($path) . '"'
        ];

        return response()->file($path, $header);
    }
}
