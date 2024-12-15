<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiPengusulan extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $keyType = 'string'; // UUID adalah string
    public $incrementing = false;

    // protected $fillable = [
    //     'status',
    //     'isi',
    // ];
}
