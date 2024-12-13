<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengusulan extends Model
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
        'date',
        'bookImage',
        'status',
    ];


    public function users():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
