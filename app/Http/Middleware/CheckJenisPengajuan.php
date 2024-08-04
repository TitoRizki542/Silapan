<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class CheckJenisPengajuan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $req = $request->jenis_pengajuan;
        $key = ['akta_kelahiran', 'akta_kematian', 'pindah_datang', 'pindah_keluar', 'kehilangan_kk','skck', 'ket_belum_menikah','surat-ket', 'surat_keterangan', 'pengantar_kehilangan'];

        if ($request->has('jenis_pengajuan')) {
            if (!in_array($req, $key)) {
                toast('Jenis pengajuan tidak cocok. Harap coba lagi.', 'error');
                return to_route('administrasi.pengajuan');
            }
        }

        $columns = ['nik', 'no_hp', 'rt', 'rw'];
        $user = UserDetail::whereUserId($request->user()->id)->whereNull($columns)->exists();

        if ($user) {
            toast('Harap lengkapi data diri kamu di menu profil.', 'error');
            return redirect()->back();
        }

        return $next($request);
    }
}
