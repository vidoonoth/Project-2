<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class pengusulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pengusulan')->insert([
            [
                'bookTitle' => 'Database Relasional', 
                'genre' => 'Teknologi Informasi', 
                'isbn' => '978-1122334455', 
                'author' => 'Alice', 
                'publicationYear' => 2020, 
                'publisher' => 'Penerbit TI', 
                'date' => '2024-01-03', 
                'bookImage' => 'images/book3.jpg', 
                'status' => 'tersedia', 
                'user_id' => 1,
            ]
        ]);
    }
}
