<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books'; // Ganti dengan nama tabel Anda

    use HasFactory;
    protected $fillable = [
        'bookTitle',
        'genre',
        'isbn',
        'author',
        'publicationYear',
        'publisher',
        'description',
        'synopsis',
        'bookImage',
    ];
}
