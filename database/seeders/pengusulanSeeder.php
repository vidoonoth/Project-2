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
                'bookTitle' => 'Atomic Habits',
                'isbn'=> 9786020,
                'genre' => 'Self Improvement',
                'author' => 'James Clear',
                'publicationYear' => 2019,
                'publisher' => 'Gramedia Pustaka Utama',
                // 'date' => '2023-10-01',
                // 'bookImage' => 'book1.jpg',
                'status' => 'diterima',
                // 'bookImage' => 'images/atomic.jpg',
                // 'description' => 'nothing',
            ]
        ]);
    }
}
