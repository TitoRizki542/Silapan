<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function pegawai()
    {
        $pegawai = Admin::whereRole('pegawai')->get();

        return view('dashboard.users.pegawai', compact('pegawai'));
    }

    public function createPegawai()
    {
        return view('dashboard.users.create-pegawai');
    }

    public function registerPegawai(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:admins,username'],
            'email' => ['required', 'email',  'unique:admins,email'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $validated['name'] = $validated['nama'];
        $validated['role'] = 'pegawai';
        $validated['password'] = Hash::make($validated['password']);
        unset($validated['nama']);

        Admin::create($validated);

        toast('Berhasil menambahkan pegawai baru.', 'success');
        return to_route('users.pegawai');
    }

    public function masyarakat()
    {
        $masyarakat = User::all();

        return view('dashboard.users.masyarakat', compact('masyarakat'));
    }

    public function detailMasyarakat($username)
    {
        $masyarakat = User::whereUsername($username)->first();

        $masyarakat->user_detail->tanggal_lahir = Carbon::parse($masyarakat->user_detail->tanggal_lahir)->format('d M Y');

        $administrasi['proses'] = Administrasi::whereUserId($masyarakat->id)->whereStatus('proses')->count();
        $administrasi['berhasil'] = Administrasi::whereUserId($masyarakat->id)->whereStatus('berhasil')->count();
        $administrasi['ditolak'] = Administrasi::whereUserId($masyarakat->id)->whereStatus('ditolak')->count();

        return view('dashboard.users.detail-masyarakat', compact('masyarakat', 'administrasi'));
    }
}
