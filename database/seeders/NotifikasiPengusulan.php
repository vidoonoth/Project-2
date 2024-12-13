<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotifikasiPengusulan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notifkasi_pengusulans')->insert([
            [
                'status' => 'Diterima',
                'isi'=> 'Pengusulan anda diterima',
            ],
            [
                'status' => 'Ditolak',
                'isi'=> 'Pengusulan anda ditolak',
            ],
            [
                'status' => 'Diproses',
                'isi'=> 'Pengusulan anda sedang di proses',
            ],
            [
                'status' => 'Tersedia',
                'isi'=> 'Buku yang anda usulkan sudah ada ',
            ],
        ]);
    }
}
