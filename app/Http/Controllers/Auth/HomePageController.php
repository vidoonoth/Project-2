<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        return view('homePage', compact('books'));
    }
}

