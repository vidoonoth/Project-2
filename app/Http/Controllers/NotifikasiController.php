<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\NotifikasiPengusulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

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

    public function destroy(Notifikasi $notifikasi, $id)
    {
        $notifikasi = Auth::user()->Notifications->find($id);
        $notifikasi->delete();

        return redirect()->route('notifUser')->with('success', 'Information deleted successfully.');
    }


    //user-------------------------------- user -------------------- user ------------ user ------------------------------------------------

    //menampilkan halaman notifikasi user
    public function notifUser()
    {
        // $notifikasi = Notifikasi::all();
        $notifikasi = Auth::user()->notifications;
        return view('notifikasiUser', compact('notifikasi'));
    }

    // Menghapus notifikasi    
    // public function hapusNotif(Notifikasi $notifikasi, $id)
    // {   
    //     $notifikasi->delete();

    //     return redirect()->route('notifUser')->with('success', 'Information deleted successfully.');
    // }

    public function hapusNotif(Notifikasi $notifikasi, $id)
    {
    // Temukan notifikasi berdasarkan UUID
    $notifikasi = Auth::notifications()->Notifications->where('id', $id)->first();

    if ($notifikasi) {
        // Hapus notifikasi
        $notifikasi->delete();

        return redirect()->route('notifUser')->with('success', 'Notifikasi berhasil dihapus.');
    }

    return redirect()->route('notifUser')->with('error', 'Notifikasi tidak ditemukan.');
    }

}

