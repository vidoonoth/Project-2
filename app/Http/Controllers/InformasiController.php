<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    // Menampilkan semua informasi
    public function index(Request $request)
    {
        $informasi = Informasi::all();

        $search = $request->input('search');
        $informasi = Informasi::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
        })->get();
        return view('admin.dataInformasiPerpustakaan', compact('informasi'));
    }

    public function sejarah()
    {
    // Ambil data pertama yang memiliki title 'sejarah'
    $sejarah = Informasi::where('title','LIKE', '%sejarah%')->first();

    // Mengirimkan data ke view dengan compact
    return view('sejarah', compact('sejarah'));
    }
    public function visiMisi()
    {
    // Ambil data pertama yang memiliki title 'sejarah'
    $visiMisi = Informasi::where('title','LIKE', '%visi%')->first();

    // Mengirimkan data ke view dengan compact
    return view('visiMisi', compact('visiMisi'));
    }

    // Menampilkan form untuk menambah informasi
    public function create()
    {
        return view('admin.createInformasi');
    }

    // Menyimpan informasi baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Informasi::create($request->all());

        return redirect()->route('informasi.index')->with('success', 'Information created successfully.');
    }


    // Menampilkan form untuk mengedit informasi
    public function edit(Informasi $informasi)
    {
        return view('admin.editInformasi', compact('informasi'));
    }

    // Mengupdate informasi
    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $informasi->update($request->all());

        return redirect()->route('informasi.index')->with('success', 'Information updated successfully.');
    }

    // Menghapus informasi
    public function destroy(Informasi $informasi)
    {
        $informasi->delete();

        return redirect()->route('informasi.index')->with('success', 'Information deleted successfully.');
    }
}
