<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;
    protected $table = 'pengusulan';
    protected $fillable = [
        'bookTitle',
        'genre',
        'isbn',
        'author',
        'publicationYear',
        'publisher',
        // 'date',
        // 'bookImage',
        'status',
    ];

    protected $casts =
    [
            'isbn' => 'integer',
            'publicationYear' => 'integer',
            // 'date' => 'date',
            // 'bookImage' => 'string',
    ];

}
