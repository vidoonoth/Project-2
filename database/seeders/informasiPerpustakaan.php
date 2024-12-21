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
        DB::table('informasis')->insert([
            [
                'title' => 'Sejarah Perpustakaan Indramayu',
                'content'=> 'Peraturan Daerah Kabupaten Daerah tingkat II Indramayu No. 14 tahun 1994 tentang Organisasi dan Tata Kerja Kantor Arsip Daerah Kabupaten Daerah Tingkat II Indramayu. Peraturan Daerah  Kabupaten Daerah tingakat II Indramayu No.13 tahun 1995 tentang Organisasi dan Tata Kerja Kantor Arsip Daerah Kabupaten Daerah Tingkat II Indramayu. Kantor Arsip Daerah dibentuk pada tanggal 9 Januari 1997. Pada tanggal 7 April 2001 disatukannya antara Kantor Arsip dan Perpustakaan Umum Daerah Kabupaten Daerah Tingkat II Indramayu yang berada dibawah dan bertanggung jawab langsung kepada Bupati melalui Sekretaris Daerah.Peraturan Daerah Nomor 19 Tahun 2002 tentang Penataan dan Pembentukan Lembaga Perangkat Daerah Kabupaten Indramayu.Keputusan Bupati Indramayu Nomor 26 Tahun 2002 tentang Organisasi dan Tata Kerja Kantor Arsip dan Perpustakaan Kabupaten Indramayu. Berdasarkan Peraturan Daerah Kabupaten Indramayu Nomor 9 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Indramayu dan ditegaskan dalam Peraturan Bupati Indramayu No. 58 Tahun 2016 tentang Organisasi dan tata kerja Dinas Kerasipan dan Perpustakaan Kabupaten Indramayu. Berdasarkan Peraturan diatas yang semula Kantor Arsip dan Perpustakaan ditetapkan menjadi Dinas Kearsipan dan Perpustakaaan.',
            ]
        ]);
    }
}
