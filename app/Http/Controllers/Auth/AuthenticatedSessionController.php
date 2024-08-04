<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginAdminRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        toast('Berhasil login.', 'success')->timerProgressBar();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Display the login view (admin).
     */
    public function createAdmin(): View
    {
        return view('auth-admin.login');
    }

    /**
     * Handle an incoming authentication request (admin).
     */
    public function storeAdmin(LoginAdminRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        toast('Berhasil login.', 'success')->timerProgressBar();

        return redirect()->intended(route('dashboards', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toast('Berhasil keluar.', 'success');

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroyAdmin(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
