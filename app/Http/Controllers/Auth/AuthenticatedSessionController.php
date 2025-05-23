<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

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
    public function store(Request $request): JsonResponse|RedirectResponse
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Coba autentikasi
    if (!Auth::attempt($credentials)) {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }

    $user = Auth::user();
    // Jika request JSON (dari Postman atau aplikasi mobile)
    if ($request->expectsJson()) {
        $user = $request->user();
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token
        ]);
    }
    $request->session()->regenerate();

    

    // Jika request biasa dari browser (form login web)
    if ($user->usertype === 'admin') {
        return redirect('dashboard');
    }

    return redirect()->intended(route('home'));
}

    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();
    //     if($request->user()->usertype === 'admin'){
    //         return redirect('dashboard');
    //     }
        

    //     return redirect()->intended(route('home'));
    // }

    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
