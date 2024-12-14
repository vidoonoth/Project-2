<?php

namespace App\Http\Requests;

// use Rules\Password;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as password;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
{
    return [
        'username' => ['required', 'string', 'max:255'], // Validasi username
        'name' => ['required', 'string', 'max:255'], // Validasi nama
        'email' => [
            'required', 
            'string', 
            'lowercase', 
            'email', 
            'max:255',
            Rule::unique(User::class)->ignore($this->user()->id),
        ], // Validasi email unik
        'numberphone' => ['required', 'string', 'min:12', 'max:12'], // Validasi nomor telepon tepat 12 karakter
        'nik' => ['required', 'string', 'min:12', 'max:15'], // Validasi NIK antara 12-15 karakter
        'gender' => ['required', 'string', 'max:255'], // Validasi gender sebagai string
        'password' => ['nullable', 'confirmed', Password::defaults()], // Validasi password opsional, harus sesuai konfirmasi
        'profile_picture' => [
            'nullable', // Gambar profil tidak wajib
            'file', // Memastikan file yang diunggah
            'image', // Memastikan file yang diunggah adalah gambar
            'mimes:jpeg,png,jpg,gif', // Menentukan ekstensi gambar yang diizinkan
            'max:2048', // Membatasi ukuran file (dalam KB, misal 2MB)
        ],
    ];
    }

}
