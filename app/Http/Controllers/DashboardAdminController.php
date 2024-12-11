<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

use App\Models\Pengusulan;
use Illuminate\Http\Request;
use Illluminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    //
    // Menampilkan semua informasi
    public function index()
    {
        $pengusulanCount = pengusulan::count();
        $booksCount = Book::count();
        $userCount = User::count();
        // $dshAdmin = DashboardAdminController::all();
        return view('admin.dashboard', compact('pengusulanCount', 'booksCount', 'userCount')); //
        // , compact('informasi'));
    }

    // Menampilkan form untuk menambah informasi
    // public function create()
    // {
    //     return view('admin.createInformasi');
    // }

    // // Menyimpan informasi baru
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);

    //     Informasi::create($request->all());

    //     return redirect()->route('informasi.index')->with('success', 'Information created successfully.');
    // }

    // // Menampilkan form untuk mengedit informasi
    // public function edit(Informasi $informasi)
    // {
    //     return view('admin.editInformasi', compact('informasi'));
    // }

    // // Mengupdate informasi
    // public function update(Request $request, Informasi $informasi)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //     ]);

    //     $informasi->update($request->all());

    //     return redirect()->route('informasi.index')->with('success', 'Information updated successfully.');
    // }

    // // Menghapus informasi
    // public function destroy(Informasi $informasi)
    // {
    //     $informasi->delete();

    //     return redirect()->route('informasi.index')->with('success', 'Information deleted successfully.');
    // }
}

