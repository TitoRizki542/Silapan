<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulirController extends Controller
{
    public function index()
    {
        return view('formulir');
    }

    public function download($berkas)
    {
        if ($berkas == 'pencatatan-sipil') {
            $filePath = public_path('formulir/Formulir_Pelaporan_Pencatatan_Sipil_Di_Wilayah_NKRI.xlsx');
            $downloadName = 'Formulir_Pelaporan_Pencatatan_Sipil_Di_Wilayah_NKRI.xlsx';
        } else if ($berkas == 'biodata-keluarga') {
            $filePath = public_path('formulir/Formulir_Biodata_Keluarga.xlsx');
            $downloadName = 'Formulir_Biodata_Keluarga.xlsx';
        } else if ($berkas == 'skck') {
            $filePath = public_path('formulir/SKCK.docx');
            $downloadName = 'SKCK.xlsx';
        } elseif ($berkas == 'belum-menikah') {
            $filePath = public_path('formulir/SURAT_KETERANGAN_BELUM_MENIKAH.docx');
            $downloadName = 'SURAT_KETERANGAN_BELUM_MENIKAH.docx';
        } else if ($berkas == 'tidak-mampu') {
            $filePath = public_path('formulir/SURAT_KETERANGAN_TIDAK_MAMPU.docx');
            $downloadName = 'SURAT_KETERANGAN_TIDAK_MAMPU.docx';
        } else if ($berkas == 'usaha') {
            $filePath = public_path('formulir/SURAT_KETERANGAN_USAHA.docx');
            $downloadName = 'SURAT_KETERANGAN_USAHA.docx';
        } elseif ($berkas == 'sk') {
            $filePath = public_path('formulir/SURAT_KETERANGAN.docx');
            $downloadName = 'SURAT_KETERANGAN.docx';
        } elseif ($berkas == 'kehilangan') {
            $filePath = public_path('formulir/SURAT_PENGANTAR_KEHILANGAN.docx');
            $downloadName = 'SURAT_PENGANTAR_KEHILANGAN.docx';
        }

        return response()->download($filePath, $downloadName);
    }
}
