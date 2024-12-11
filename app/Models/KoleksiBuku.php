<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiBuku extends Model
{
    use HasFactory;
    protected $table = 'koleksi_bukus';
    protected $fillable = [
        'bookImage',
        'bookTitle',
        'genre',
        'isbn',
        'author',
        'publicationYear',
        'publisher',
        'description',
        'synopsis',
    ];
}
