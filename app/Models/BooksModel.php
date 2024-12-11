<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookTitle',
        'isbn',
        'genre',
        'author',
        'yearPublication', // Untuk kolom year
        'publisher',
        'bookImage',
        'description',
    ];
}
