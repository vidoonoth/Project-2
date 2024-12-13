<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class koleksiBuku extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('books')->insert([
            [
                'bookTitle' => 'Atomic Habits',
                'isbn' => '9786020',
                'genre' => 'Self Improvement',
                'author' => 'James Clear',
                'publicationYear' => '2019',
                'publisher' => 'Gramedia Pustaka Utama',
                'description' => 'A comprehensive guide to building good habits and breaking bad ones.',
                'synopsis' => 'This book provides proven strategies to improve your life by changing your habits.',
                'bookImage' => 'book_images/atomic.jpg', // Gambar default atau path placeholder
            ]
        ]);

    }
}
