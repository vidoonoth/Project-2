<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{


    public function index(Request $request)
    {
        $books = Book::all(); // Mengambil semua data buku
        $search = $request->input('search');

        // Query untuk mencari data berdasarkan judul atau status query builder
        $books = Book::when($search, function ($query, $search) {
            return $query->where('bookTitle', 'like', '%' . $search . '%')
                        ->orWhere('genre', 'like', '%' . $search . '%')
                        ->orWhere('isbn', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('publicationYear', 'like', '%' . $search . '%')
                        ->orWhere('publisher', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('synopsis', 'like', '%' . $search . '%');
        })->get();
        return view('admin.dataKoleksiBuku', compact('books')); // Mengirim data ke view
    }
    public function koleksiBuku(Request $request)
    {
        $books = Book::all(); // Mengambil semua data buku
        $search = $request->input('search');
        $books = Book::when($search, function ($query, $search) {
            return $query->where('bookTitle', 'like', '%' . $search . '%')
                        ->orWhere('genre', 'like', '%' . $search . '%')
                        ->orWhere('isbn', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('publicationYear', 'like', '%' . $search . '%')
                        ->orWhere('publisher', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('synopsis', 'like', '%' . $search . '%');
        })->get();
        return view('koleksiBuku', compact('books')); // Mengirim data buku ke view
    }
    public function koleksiBukuHome(Request $request)
    {
        $books = Book::take(10)->get(); // Mengambil hanya 6 data buku
        return view('HomePage', compact('books')); // Mengirim data buku ke view
    }


    public function show($id)
    {
    // Ambil buku berdasarkan ID
        $book = Book::findOrFail($id);

    // Kembalikan view dengan data buku
        return view('admin.detailDataBuku', compact('book'));
    }


    public function create()
    {
        return view('admin.createBuku');
    }

    public function store(Request $request)
    {
    $request->validate([
        'bookTitle' => 'required|string',
        'genre' => 'required|string|max:255',
        'isbn' => 'nullable|string',
        'author' => 'required|string',
        'publicationYear' => 'required|string',
        'publisher' => 'required|string',
        'description' => 'required|string',
        'synopsis' => 'required|string',
        'bookImage' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Simpan gambar dan ambil nama file
    $bookImagePath = null;
    
    if ($request->hasFile('bookImage')) {
        // Simpan gambar ke folder 'public/book_images'
        $bookImagePath = $request->file('bookImage')->store('book_images', 'public');
    }
    // Simpan data buku
    Book::create([
        'bookTitle' => $request->bookTitle,
        'genre' => $request->genre,
        'isbn' => $request->isbn,
        'author' => $request->author,
        'publicationYear' => $request->publicationYear,
        'publisher' => $request->publisher,
        'description' => $request->description,
        'synopsis' => $request->synopsis,
        'bookImage' => $bookImagePath,  // Simpan hanya nama file
    ]);

    return redirect()->route('books.index')->with('success', 'Book created successfully');
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.editBuku', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'bookTitle' => 'required|string',
            'genre' => 'required|string',
            'isbn' => 'nullable|string',
            'author' => 'required|string',
            'publicationYear' => 'required|string',
            'publisher' => 'required|string',
            'description' => 'required|string',
            'synopsis' => 'required|string',
            'bookImage' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('bookImage')) {
            if ($book->bookImage) {
                Storage::disk('public')->delete($book->bookImage);
            }
            $book->bookImage = $request->file('bookImage')->store('book_images', 'public');
            // $validated['bookImage'] = $request->file('bookImage')->store('book_images', 'public');
        }

        $book->update($request->except('bookImage'));
        // $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->bookImage) {
            Storage::disk('public')->delete($book->bookImage);
        }
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
