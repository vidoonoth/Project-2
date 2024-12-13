<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class informasiPerpustakaan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('informasi_perpustakaans')->insert([
            [
                'title' => 'Sejarah Perpustakaan Indramayu',
                'content'=> 'Sejarah beridirinya Perpustakaan Indramayu',
            ]
        ]);
    }
}
