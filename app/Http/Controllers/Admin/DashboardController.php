<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalMasyarakat = User::count();
        $totalAdm = Administrasi::count();

        return view('dashboard.index', compact('totalMasyarakat', 'totalAdm'));
    }
}
