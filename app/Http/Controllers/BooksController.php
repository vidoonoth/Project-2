<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    //
    public function index()
    {
        $books = BooksModel::all();
        return view('homePage', compact('books'));
    }
}
