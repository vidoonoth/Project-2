<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     * 
     */
 public function index(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        return redirect()->route('login'); // untuk web
    }

    if ($request->expectsJson()) {
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'nik' => $user->nik,
            'numberphone' => $user->numberphone,
            'gender' => $user->gender,
            'created_at' => \Carbon\Carbon::parse($user->created_at)->locale('id')->translatedFormat('d F Y'),
            'profileImage' => $user->profile_image ? url('storage/profile_images/' . $user->profile_image) : null, // pastikan path-nya benar
        ]);
    }

    // Untuk view web
    $passwordLength = strlen($user->password);
    $passwordStars = str_repeat('*', 3);
    return view('profile.profile', compact('user', 'passwordStars'));
}


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // public function update(Request $request) { 
    //     $user = Auth::user(); 
    //     $request->validate([ 
    //         'username' => 'required|string|max:100', 
    //         'name' => 'required|string|max:100', 
    //         'email' => 'required|string|email|max:150|unique:users,email,' . $user->id, 
    //         'numberphone' => 'required|string', 
    //         'nik' => 'required|string', 
    //         'gender' => 'required|string', 
    //         'password' => 'nullable|string|min:8' ]); 
            
    //     $user->fill([ 
    //         'username' => $request->username, 
    //         'name' => $request->name, 
    //         'email' => $request->email, 
    //         'numberphone' => $request->numberphone, 
    //         'nik' => $request->nik, 
    //         'gender' => $request->gender, 
    //         'password' => $request->password ? Hash::make($request->password) : $user->password, 
    //     ]);
    //     $request->user()->save(); 
    //     return redirect()->route('profile.index')->with('success', 'Profile updated successfully!'); 
    // }

public function update(ProfileUpdateRequest $request)
{
    $user = $request->user();

    // Ambil data validasi
    $validatedData = $request->validated();

    // Jika gender tidak dikirim, gunakan nilai lama
    $validatedData['gender'] = $request->input('gender', $user->gender);

    // Isi data ke model user
    $user->fill($validatedData);

    // Logika foto profil
    if ($request->hasFile('profileImage')) {
        // Hapus gambar lama jika ada
        if ($user->profile_image) {
            Storage::disk('public')->delete('profile_images/' . $user->profile_image);
        }

        // Simpan gambar baru dan ambil hanya nama filenya
        $file = $request->file('profileImage');
        $filename = $file->hashName(); // contoh: abc123.png
        $file->storeAs('profile_images', $filename, 'public');

        $user->profile_image = $filename;
    }

    // Simpan data user
    $user->save();

    return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
}


    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

   
}
