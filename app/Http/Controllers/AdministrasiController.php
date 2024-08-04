<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Syarat;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Enums\JenisPengajuan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class AdministrasiController extends Controller
{
    public function search()
    {
        $query = request()->jenis_pengajuan;

        $pencarian = Administrasi::where('jenis_pengajuan', $query)
        ->orderBy('id','AS')
        ->get();
    }

    public function administrasi()
    {
        $query = Administrasi::query();

        if (request()->filled('jenis_pengajuan')) {
            $pengajuan = request()->input('jenis_pengajuan');

            $query->where('jenis_pengajuan', $pengajuan);
        }

        if (request()->filled('no_tiket')) {
            $noTiket = request()->input('no_tiket');

            $query->where('no_tiket', "LIKE", '%' . $noTiket . '%');
        }

        $administrasis = $query->whereUserId(auth()->user()->id)->latest()->paginate(5);

        $jenisPengajuan = JenisPengajuan::cases();

        return view('administrasi.index', compact('administrasis', 'jenisPengajuan'));
    }

    public function detailPengajuan(Request $request,$ticket)
    {

        set_time_limit(300);

        $pengajuan = Administrasi::whereNoTiket($ticket)->first();

        if($request->get('export') == 'pdf')
            {
                $pdf = PDF::loadView('administrasi.bukti_pengajuan', ['pengajuan' => $pengajuan])->setPaper('a4','potrait');
                return $pdf->stream('pengajuan-saya.pdf');
            }
        return view('administrasi.detail-pengajuan', compact('pengajuan'));
    }

    public function pengajuan()
    {
        if (!request()->jenis_pengajuan) {
            return view('administrasi.pengajuan');
        }

        return view('administrasi.pengajuan.form');
    }

    public function pengajuanAktaKelahiran(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'sk_lahir' => 'required|file|mimes:pdf|max:2048',
            'ktp_ortu' => 'required|file|mimes:pdf|max:2048',
            'ktp_saksi1' => 'required|file|mimes:pdf|max:2048',
            'ktp_saksi2' => 'required|file|mimes:pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
            'buku_nikah' => 'required|file|mimes:pdf|max:2048',
            'form_pengajuan' => 'required|file|mimes:xlsx,xls|max:2048',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_akta_kelahiran/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('sk_lahir')) {
            $fileNames['sk_lahir']['nama'] = 'Surat Keterangan Lahir Rumah Sakit/Bidan';
            $fileNames['sk_lahir']['berkas'] = $validated['sk_lahir']->store($path);
        }

        if ($request->hasFile('ktp_ortu')) {
            $fileNames['ktp_ortu']['nama'] = 'KTP Orang Tua Bayi';
            $fileNames['ktp_ortu']['berkas'] = $validated['ktp_ortu']->store($path);
        }

        if ($request->hasFile('ktp_saksi1')) {
            $fileNames['ktp_saksi1']['nama'] = 'KTP Saksi 1';
            $fileNames['ktp_saksi1']['berkas'] = $validated['ktp_saksi1']->store($path);
        }

        if ($request->hasFile('ktp_saksi2')) {
            $fileNames['ktp_saksi2']['nama'] = 'KTP Saksi 2';
            $fileNames['ktp_saksi2']['berkas'] = $validated['ktp_saksi2']->store($path);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $fileNames['kartu_keluarga']['nama'] = 'Kartu Keluarga';
            $fileNames['kartu_keluarga']['berkas'] = $validated['kartu_keluarga']->store($path);
        }

        if ($request->hasFile('buku_nikah')) {
            $fileNames['buku_nikah']['nama'] = 'Buku Nikah';
            $fileNames['buku_nikah']['berkas'] = $validated['buku_nikah']->store($path);
        }

        if ($request->hasFile('form_pengajuan')) {
            $fileNames['form_pengajuan']['nama'] = 'Form Pengajuan';
            $fileNames['form_pengajuan']['berkas'] = $validated['form_pengajuan']->store($path);
        }

        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'akta_kelahiran',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }


    public function pengajuanAktaKematian(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'ktp_meninggal' => 'required|file|mimes:pdf|max:2048',
            'ktp_saksi1' => 'required|file|mimes:pdf|max:2048',
            'ktp_saksi2' => 'required|file|mimes:pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
            'sk_kematian' => 'required|file|mimes:pdf|max:2048',
            'form_pengajuan' => 'required|file|mimes:xlsx,xls|max:2048',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_akta_kematian/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('ktp_meninggal')) {
            $fileNames['ktp_meninggal']['nama'] = 'KTP Orang yang Meninggal';
            $fileNames['ktp_meninggal']['berkas'] = $validated['ktp_meninggal']->store($path);
        }

        if ($request->hasFile('ktp_saksi1')) {
            $fileNames['ktp_saksi1']['nama'] = 'KTP Saksi 1';
            $fileNames['ktp_saksi1']['berkas'] = $validated['ktp_saksi1']->store($path);
        }

        if ($request->hasFile('ktp_saksi2')) {
            $fileNames['ktp_saksi2']['nama'] = 'KTP Saksi 2';
            $fileNames['ktp_saksi2']['berkas'] = $validated['ktp_saksi2']->store($path);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $fileNames['kartu_keluarga']['nama'] = 'Kartu Keluarga';
            $fileNames['kartu_keluarga']['berkas'] = $validated['kartu_keluarga']->store($path);
        }

        if ($request->hasFile('sk_kematian')) {
            $fileNames['sk_kematian']['nama'] = 'Surat Keterangan Kematian dari Desa/Rumah Sakit';
            $fileNames['sk_kematian']['berkas'] = $validated['sk_kematian']->store($path);
        }

        if ($request->hasFile('form_pengajuan')) {
            $fileNames['form_pengajuan']['nama'] = 'Form Pengajuan';
            $fileNames['form_pengajuan']['berkas'] = $validated['form_pengajuan']->store($path);
        }

        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'akta_kematian',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }


    public function pengajuanPindahDatang(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'skpwni' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'buku_nikah' => 'nullable|file|mimes:pdf|max:2048',
            'akta_kelahiran' => 'required|file|mimes:pdf|max:2048',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_pindah_datang/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('skpwni')) {
            $fileNames['skpwni']['nama'] = 'SKPWNI (Surat Keterangan Pindah Warga Negara Indonesia)';
            $fileNames['skpwni']['berkas'] = $validated['skpwni']->store($path);
        }

        if ($request->hasFile('ktp')) {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = $validated['ktp']->store($path);
        }

        if ($request->hasFile('buku_nikah')) {
            $fileNames['buku_nikah']['nama'] = 'Buku Nikah';
            $fileNames['buku_nikah']['berkas'] = $validated['buku_nikah']->store($path);
        } else {
            $fileNames['buku_nikah']['nama'] = 'Buku Nikah';
            $fileNames['buku_nikah']['berkas'] = '-';
        }

        if ($request->hasFile('akta_kelahiran')) {
            $fileNames['akta_kelahiran']['nama'] = 'Akta Kelahiran';
            $fileNames['akta_kelahiran']['berkas'] = $validated['akta_kelahiran']->store($path);
        }

        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'pindah_datang',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }


    public function pengajuanPindahKeluar(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'ktp' => 'required|file|mimes:pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
            'alamat_tujuan' => 'required|string',
            'buku_nikah' => 'nullable|file|mimes:pdf|max:2048',
            'surat_pernyataan_orang_tua' => 'nullable|file|mimes:pdf|max:2048',
            'surat_pernyataan_pasangan' => 'nullable|file|mimes:pdf|max:2048',
            'form_pengajuan' => 'required|file|mimes:xlsx,xls|max:2048',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_pindah_keluar/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('ktp')) {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = $validated['ktp']->store($path);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $fileNames['kartu_keluarga']['nama'] = 'Kartu Keluarga';
            $fileNames['kartu_keluarga']['berkas'] = $validated['kartu_keluarga']->store($path);
        }

        if ($request->hasFile('buku_nikah')) {
            $fileNames['buku_nikah']['nama'] = 'Buku Nikah';
            $fileNames['buku_nikah']['berkas'] = $validated['buku_nikah']->store($path);
        } else {
            $fileNames['buku_nikah']['nama'] = 'Buku Nikah';
            $fileNames['buku_nikah']['berkas'] = '-';
        }

        if ($request->hasFile('surat_pernyataan_orang_tua')) {
            $fileNames['surat_pernyataan_orang_tua']['nama'] = 'Surat Pernyataan Orang Tua';
            $fileNames['surat_pernyataan_orang_tua']['berkas'] = $validated['surat_pernyataan_orang_tua']->store($path);
        } else {
            $fileNames['surat_pernyataan_orang_tua']['nama'] = 'Surat Pernyataan Orang Tua';
            $fileNames['surat_pernyataan_orang_tua']['berkas'] = '-';
        }

        if ($request->hasFile('surat_pernyataan_pasangan')) {
            $fileNames['surat_pernyataan_pasangan']['nama'] = 'Surat Pernyataan Pasangan';
            $fileNames['surat_pernyataan_pasangan']['berkas'] = $validated['surat_pernyataan_pasangan']->store($path);
        } else {
            $fileNames['surat_pernyataan_pasangan']['nama'] = 'Surat Pernyataan Pasangan';
            $fileNames['surat_pernyataan_pasangan']['berkas'] = '-';
        }

        if ($request->hasFile('form_pengajuan')) {
            $fileNames['form_pengajuan']['nama'] = 'Form Pengajuan';
            $fileNames['form_pengajuan']['berkas'] = $validated['form_pengajuan']->store($path);
        }

        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'pindah_keluar',
            'alamat_tujuan' => $validated['alamat_tujuan']
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }


    public function pengajuanKehilanganKK(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'ktp' => 'nullable|file|mimes:pdf|max:2048',
            'surat_kehilangan' => 'required|file|mimes:pdf|max:2048',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_kehilangan_kk/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('ktp')) {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = $validated['ktp']->store($path);
        } else {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = '-';
        }

        if ($request->hasFile('surat_kehilangan')) {
            $fileNames['surat_kehilangan']['nama'] = 'Surat Kehilangan dari Polres';
            $fileNames['surat_kehilangan']['berkas'] = $validated['surat_kehilangan']->store($path);
        }

        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'kehilangan_kk',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }


    public function success($tiket)
    {
        return view('administrasi.pengajuan.success');
    }


    public function pengajuanSkck(Request $request)
    {
         // Validasi
         $validated = $request->validate([
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'nullable|file|mimes:pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
            'akta_kelahiran' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_skck/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        if ($request->hasFile('ktp')) {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = $validated['ktp']->store($path);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $fileNames['kartu_keluarga']['nama'] = 'Kartu Keluarga';
            $fileNames['kartu_keluarga']['berkas'] = $validated['kartu_keluarga']->store($path);
        }

        if ($request->hasFile('akta_kelahiran')) {
            $fileNames['akta_kelahiran']['nama'] = 'Akta Kelahiran';
            $fileNames['akta_kelahiran']['berkas'] = $validated['akta_kelahiran']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'skck',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }

    public function pengajuanKetBelumMenikah(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'nullable|file|mimes:pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
            'akta_kelahiran' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_KetBelumMenikah/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        if ($request->hasFile('ktp')) {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = $validated['ktp']->store($path);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $fileNames['kartu_keluarga']['nama'] = 'Kartu Keluarga';
            $fileNames['kartu_keluarga']['berkas'] = $validated['kartu_keluarga']->store($path);
        }

        if ($request->hasFile('akta_kelahiran')) {
            $fileNames['akta_kelahiran']['nama'] = 'Akta Kelahiran';
            $fileNames['akta_kelahiran']['berkas'] = $validated['akta_kelahiran']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'ket_belum_menikah',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }

    public function pengajuanSuratKeterangan(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'nullable|file|mimes:pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
            'akta_kelahiran' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_surat_Keterangan/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        if ($request->hasFile('ktp')) {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = $validated['ktp']->store($path);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $fileNames['kartu_keluarga']['nama'] = 'Kartu Keluarga';
            $fileNames['kartu_keluarga']['berkas'] = $validated['kartu_keluarga']->store($path);
        }

        if ($request->hasFile('akta_kelahiran')) {
            $fileNames['akta_kelahiran']['nama'] = 'Akta Kelahiran';
            $fileNames['akta_kelahiran']['berkas'] = $validated['akta_kelahiran']->store($path);
        }

        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'surat_keterangan',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }


    public function pengajuanPengantarKehilangan(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'ktp' => 'nullable|file|mimes:pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Generate Untuk No Tiket
        $ticket = chr(rand(65, 90)) . '-' . now()->format('his');

        // Membuat jalur folder
        $path = auth()->user()->username . '/' . $ticket . '_pengantar_kehilangan/';

        // Menyimpan file kedalam folder public/storage
        if ($request->hasFile('surat_pengantar')) {
            $fileNames['surat_pengantar']['nama'] = 'Surat Pengantar';
            $fileNames['surat_pengantar']['berkas'] = $validated['surat_pengantar']->store($path);
        }

        if ($request->hasFile('ktp')) {
            $fileNames['ktp']['nama'] = 'KTP';
            $fileNames['ktp']['berkas'] = $validated['ktp']->store($path);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $fileNames['kartu_keluarga']['nama'] = 'Kartu Keluarga';
            $fileNames['kartu_keluarga']['berkas'] = $validated['kartu_keluarga']->store($path);
        }


        // Menambah ke Database
        $administrasi = Administrasi::create([
            'user_id' => auth()->user()->id,
            'no_tiket' => $ticket,
            'jenis_pengajuan' => 'pengantar_kehilangan',
        ]);

        foreach ($fileNames as $fileName) {
            Syarat::create([
                'administrasi_id' => $administrasi->id,
                'nama' => $fileName['nama'],
                'berkas' => $fileName['berkas']
            ]);
        }

        toast('Berhasil membuat pengajuan. Harap menunggu konfirmasi dari admin.', 'success');
        return redirect()->route('administrasi.pengajuan.success', $administrasi->no_tiket);
    }

    public function buktiPengajuan($ticket)
    {
        $administrasi = Administrasi::whereNoTiket($ticket)->first();

        return view('administrasi.bukti_pengajuan', compact('administrasi'));
    }

}
