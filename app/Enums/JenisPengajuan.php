<?php

namespace App\Enums;

enum JenisPengajuan: string
{
    case AktaKelahiran = "akta_kelahiran";
    case AktaKematian = "akta_kematian";
    case PindahDatang = "pindah_datang";
    case PindahKeluar = "pindah_keluar";
    case KehilanganKK = "kehilangan_kk";
    case skck = "skck";
    case BelumMenikah = "ket_belum_menikah";
    case SuratKeterangan = "surat_keterangan";
    case PengantarKehilangan = "pengantar_kehilangan";
}
