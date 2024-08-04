<?php

namespace App\Enums;

enum StatusPengajuan: string
{
    case Proses = "proses";
    case Berhasil = "berhasil";
    case Ditolak = "ditolak";
}
