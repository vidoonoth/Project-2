<?php

namespace App\Http\Controllers;

use id;
Use App\Models\User;
use App\Models\Pengusulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DiterimaNotification;

class pengusulanController extends Controller
{
    
    // untuk menampilkan pengusulan yang sudah diusulkan
    public function index(Request $request)
    {
        // $user = User::where('user_id');
        $user = Auth::id();
        // $pengusulan = Pengusulan::with('user')->get();
        $search = $request->input('search');

        // Query untuk mencari data berdasarkan judul atau status query builder
        $pengusulan = Pengusulan::join('users', 'pengusulan.user_id', '=', 'users.id')
        ->select('pengusulan.*', 'username')
        ->where('pengusulan.user_id', $user)
        ->when($search, function ($query, $search) {
            return $query->where('bookTitle', 'like', '%' . $search . '%')
                        ->orWhere('genre', 'like', '%' . $search . '%')
                        ->orWhere('isbn', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('publicationYear', 'like', '%' . $search . '%')
                        ->orWhere('publisher', 'like', '%' . $search . '%')
                        ->orWhere('date', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');                        
        })
        ->orderBy('created_at', 'desc')
        ->get();
        // Kirim data usulan ke tampilan riwayatPengusulan
        return view('riwayatPengusulan', compact('pengusulan'));
    }
    
    // logika untuk melakukan pengusulan
    public function create()
    {
        return view('pengusulan');
    }

    // logic untuk pengusulan
    public function store(Request $request)
    {

    
    // Validasi input
    $request->validate([
        'bookTitle' => 'required|string',
        'genre' => 'required|string|max:255',
        'isbn' => 'nullable|string',
        'author' => 'required|string|max:255',
        'publicationYear' => 'required|string',
        'publisher' => 'required|string|max:255',
        'date' => 'required|date',
        'bookImage' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        
    ]);

    // Menangani file gambar jika ada
    $bookImagePath = null;  // Set default to null
    if ($request->hasFile('bookImage')) {
        // Simpan gambar ke folder 'public/book_images'
        $bookImagePath = $request->file('bookImage')->store('images', 'public');
    }

    // Simpan data buku ke dalam database dengan user_id
    $pengusulan = Pengusulan::create([
        'bookTitle' => $request->bookTitle,
        'genre' => $request->genre,
        'isbn' => $request->isbn,
        'author' => $request->author,
        'publicationYear' => $request->publicationYear,
        'publisher' => $request->publisher,
        'date' => $request->date,
        'bookImage' => $bookImagePath,  // Menyimpan nama file gambar
        'status' => "diproses",  // Status default        
        'user_id' => Auth::id(),
    ]);
    $user = Auth::user();
    Notification::send($user, new DiterimaNotification($pengusulan));
    

    // Redirect setelah berhasil menyimpan
    return redirect()->route('pengusulan.index')->with('success', 'Usulan buku berhasil diajukan!');
    }

    public function show($id)
    {
        $pengusulan = Pengusulan::findOrFail($id);
        // Kirim data usulan ke tampilan riwayatPengusulan
        return view('admin.detailDataPengusulan', compact('pengusulan')); //
        // compact('pengusulan')
    }

    //pengusul untuk berpindah ke halaman editPengusulan
    public function edit($id){
        $pengusulan = Pengusulan::findOrFail($id);
        return view('editPengusulan', compact('pengusulan'));
    }

    //logic pengusul untuk mengupdate usulan
    public function update(Request $request, $id)
    {
        $pengusulan = Pengusulan::findOrFail($id);

        $request->validate([
            'bookTitle' => 'required|string',
            'genre' => 'required|string|max:255',
            'isbn' => 'nullable|string',
            'author' => 'required|string|max:255',
            'publicationYear' => 'required|string',
            'publisher' => 'required|string|max:255',
            'date' => 'required|date',
            'bookImage' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // if ($request->hasFile('bookImage')) {
        //     if ($pengusulan->bookImage) {
        //         Storage::disk('public')->delete($pengusulan->bookImage);
        //     }
        //     $pengusulan->bookImage = $request->file('bookImage')->store('book_images', 'public');
        // }

        // $pengusulan->update($request->except('bookImage'));

        if ($request->hasFile('bookImage')) {
            // Hapus gambar lama jika ada
            if ($pengusulan->bookImage) {
                Storage::disk('public')->delete($pengusulan->bookImage);
            }
            // Simpan gambar baru
            $pengusulan->bookImage = $request->file('bookImage')->store('book_images', 'public');
            } elseif (!$request->hasFile('bookImage') && $pengusulan->bookImage) {
            // Jika tidak ada gambar baru dan gambar sebelumnya ada, set gambar ke null
                $pengusulan->bookImage = null;
            }

        $pengusulan->update($request->except('bookImage'));


        return redirect()->route('pengusulan.index')->with('success', 'Book updated successfully');
    }
     
    //pengusul untuk menghapus usulan
    public function destroy($id)
    {
        $pengusulan = Pengusulan::findOrFail($id);
        if ($pengusulan->bookImage) {
            Storage::disk('public')->delete($pengusulan->bookImage);
        }
        $pengusulan->delete();

        return redirect()->route('pengusulan.index')->with('success', 'Book deleted successfully');
    }
    

    // admin ------------ admin -------- admin --- admin---------- admin------- admin--------------------------------
    public function dataPengusulan(Request $request){
        $search = $request->input('search');
    
        // Query untuk mencari data berdasarkan pencarian
        $pengusulan = Pengusulan::when($search, function ($query, $search) {
            return $query->where('bookTitle', 'like', '%' . $search . '%')
                        ->orWhere('genre', 'like', '%' . $search . '%')
                        ->orWhere('isbn', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('publicationYear', 'like', '%' . $search . '%')
                        ->orWhere('publisher', 'like', '%' . $search . '%')
                        ->orWhere('date', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        // Mencari berdasarkan nama user
                        ->orWhereHas('user', function($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
        })
        ->orderBy('created_at', 'desc')
        ->get();
    
        return view('admin.dataPengusulan', compact('pengusulan')); // Mengirim data buku ke view
    }
    
    //admin untuk pindah ke halaman edit data usulan
    public function editDataPengusulan($id)
    {
        $pengusulan = Pengusulan::findOrFail($id);
        return view('admin.editDataPengusulan', compact('pengusulan'));
    }
    
    //logika admin untuk mengupdate data usulan
    public function updateDataPengusulan(Request $request, $id)
     {
         // Cari data pengusulan berdasarkan ID
         $pengusulan = Pengusulan::findOrFail($id);

         // Validasi hanya untuk kolom status
         $request->validate([
             'status' => 'required|string|max:255', // Validasi status
         ]);

         // Hanya memperbarui kolom status
         $pengusulan->status = $request->status;

         // Simpan perubahan
         $pengusulan->save();

         // Redirect ke halaman index dengan pesan sukses
         return redirect()->route('dataPengusulan')->with('success', 'Status updated successfully');
     }

    // admin untuk hapus data usulan
    public function hapusData($id)
    {
        $pengusulan = Pengusulan::findOrFail($id);
        if ($pengusulan->bookImage) {
            Storage::disk('public')->delete($pengusulan->bookImage);
        }
        $pengusulan->delete();

        return redirect()->route('dataPengusulan')->with('success', 'Book deleted successfully');
    }

    //admin untuk mencetak data usulan
    public function cetakPengusulan(Request $request)
    {
        $pengusulan = Pengusulan::all(); // Mengambil semua data buku
        $search = $request->input('search');

        // Query untuk mencari data berdasarkan judul atau status query builder
        $pengusulan = Pengusulan::when($search, function ($query, $search) {
            return $query->where('bookTitle', 'like', '%' . $search . '%')
                        ->orWhere('genre', 'like', '%' . $search . '%')
                        ->orWhere('isbn', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('publicationYear', 'like', '%' . $search . '%')
                        ->orWhere('publisher', 'like', '%' . $search . '%')
                        ->orWhere('date', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
        })->get();
        return view('admin.cetakPengusulan', compact('pengusulan')); // Mengirim data buku ke view
    }
}
