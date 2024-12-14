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
    public function index(Request $request){
        $user = auth::user();
        $passwordLength = strlen($user->password);
        $passwordStars = str_repeat('*', 3);

        return view('profile.profile',compact('user', 'passwordStars'));
        
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
        // $request->user()->fill($request->validated());        

        // $user = Auth::user();

        $user = $request->user();
        $user->fill($request->validated());

        // if ($request->filled('password')) {
        //     $user->password = bcrypt($request->password);
        // }
        // logika foto profil
        // if ($request->hasFile('profileImage')) {
        //     // Hapus gambar lama jika ada
        //     if ($user->profileImage) {
        //         Storage::disk('public')->delete($user->profileImage);
        //     }
        //     // Simpan gambar baru
        //     $user->profileImage = $request->file('profileImage')->store('book_images', 'public');
        // }elseif (!$request->hasFile('profileImage') && $user->profileImage) {
        //     // Jika tidak ada gambar baru dan gambar sebelumnya ada, set gambar ke null
        //         $user->profileImage = null;
        // }


        if ($request->hasFile('profileImage')) {
            // Hapus gambar lama jika ada
            if ($user->profileImage) {
                Storage::disk('public')->delete($user->profileImage);
            }
            // Simpan gambar baru
            $user->profileImage = $request->file('profileImage')->store('profile_images', 'public');
        } elseif (!$request->hasFile('profileImage') && $user->profileImage) {
            // Jika tidak ada gambar baru dan gambar sebelumnya ada, biarkan gambar tetap ada
            // Anda tidak perlu melakukan apa-apa di sini, gambar tidak akan dihapus
        }
        

        $request->user()->save();

        
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
