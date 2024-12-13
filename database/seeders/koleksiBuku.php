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
                'bookTitle' => 'Laut Bercerita',
                'genre' => 'Fiction',
                'isbn' => '9786020331234',
                'author' => 'Leila S. Chudori',
                'publicationYear' => '2017',
                'publisher' => 'Gramedia Pustaka Utama',
                'description' => 'Buku ini menceritakan perjuangan seorang aktivis dalam masa Orde Baru.',
                'synopsis' => 'Cerita penuh emosi yang menggambarkan pengorbanan, kehilangan, dan harapan.',
                'bookImage' => null,
                'created_at' => now(),
                'updated_at' => now(), // Gambar default atau path placeholder
            ]
        ]);

    }
}
