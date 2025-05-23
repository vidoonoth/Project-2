<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Log;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    //
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
    
        // if ($request->expectsJson()) {
        //     return response()->json($books, 200);
        // }

        if ($request->expectsJson()) {
    $books = $books->map(function ($book) {
        $book->bookImage = $book->bookImage
            ? url('storage/book_Images/' . $book->bookImage)
            : null;
        // Log::info('Book Image URL: ' . $book->bookImage);
        return $book;
    });
    return response()->json($books, 200);
}
    
    }
}
