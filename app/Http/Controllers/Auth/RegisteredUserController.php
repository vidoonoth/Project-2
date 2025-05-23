<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse|\Illuminate\Http\JsonResponse
{
    $request->validate([
        'username' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'numberphone' => ['required', 'string', 'min:10', 'max:13'],
        'nik' => ['required', 'string', 'min:16', 'max:16'],
        'gender' => ['required', 'string', 'max:255'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'numberphone' => $request->numberphone,
        'nik' => $request->nik,
        'gender' => $request->gender,
        'password' => Hash::make($request->password),
        'profileImage' => null,
    ]);

    event(new Registered($user));
    Auth::login($user);

    // Jika API request (Expect JSON)
    if ($request->expectsJson()) {
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    // Jika request biasa (dari browser)
    return redirect(route('home', absolute: false));
}

}
