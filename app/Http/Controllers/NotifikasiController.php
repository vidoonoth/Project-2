<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // Menampilkan semua informasi
    public function index()
    {
        $notifikasi = Notifikasi::all();
        return view('admin.notifikasiPengusulan', compact('notifikasi'));
    }
    public function notifUser()
    {
        $notifikasi = Notifikasi::all();
        return view('notifikasiUser', compact('notifikasi'));
    }

    // Menampilkan form untuk menambah informasi
    public function create()
    {
        return view('admin.createNotifikasi');
    }

    // Menyimpan informasi baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Notifikasi::create($request->all());

        return redirect()->route('notifikasi.index')->with('success', 'Information created successfully.');
    }

    // Menampilkan form untuk mengedit informasi
    public function edit(Notifikasi $notifikasi)
    {
        return view('admin.editNotifikasi', compact('notifikasi'));
    }

    // Mengupdate informasi
    public function update(Request $request, Notifikasi $notifikasi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $notifikasi->update($request->all());

        return redirect()->route('notifikasi.index')->with('success', 'Information updated successfully.');
    }

    // Menghapus informasi
    public function destroy(Notifikasi $notifikasi)
    {
        $notifikasi->delete();

        return redirect()->route('notifikasi.index')->with('success', 'Information deleted successfully.');
    }
}

