<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckNoTicket
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tiket = $request->tiket;
        $administrasi = Administrasi::whereNoTiket($tiket)->exists();

        if (!$administrasi) {
            return abort(404, 'Not Foud');
        }
        return $next($request);
    }
}
