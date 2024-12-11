<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPerpustakaan extends Model
{
    use HasFactory;
    protected $table = 'informasi_perpustakaans';
    protected $fillable = [
        'title',
        'content',
    ];
}
