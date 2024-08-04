<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplatePengajuanController extends Controller
{
    public function aktaKelahiran()
    {
        $path = 'formulir/form_akta_kelahiran.xlsx';
        return response()->download($path, 'FormulirAktaKelahiran.xlsx');
    }
}
