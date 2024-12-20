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
                'bookTitle' => 'Aroma Karsa',
                'genre' => 'Fiksi',
                'isbn' => '9786022914631',
                'author' => 'Dee Lestari',
                'publicationYear' => '2018',
                'publisher' => 'Bentang Pustaka',
                'description' => '724 halaman',
                'synopsis' => 'Aroma Karsa mengisahkan Jati Wesi, pemuda dengan penciuman luar biasa, yang terlibat dalam pencarian bunga mistis Puspa Karsa bersama Raras Prayagung. Puspa Karsa, bunga yang diyakini bisa mengendalikan kehendak, membawa Jati ke dalam berbagai misteri dan rahasia besar di balik bunga tersebut.',
                'bookImage' => null,
            ],
            [
                'bookTitle' => 'Atomic Habits',
                'genre' => 'Self Improvement',
                'isbn' => '9786020667188',
                'author' => 'James Clear',
                'publicationYear' => '2018',
                'publisher' => 'Gramedia Pustaka Utama',
                'description' => '352 halaman',
                'synopsis' => 'Atomic Habits menjelaskan bagaimana kebiasaan kecil dan konsisten dapat menghasilkan perubahan besar dalam hidup. Buku ini menawarkan strategi praktis dan contoh nyata untuk menunjukkan dampak keputusan kecil dalam mencapai kesuksesan dan kebahagiaan jangka panjang.',
                'bookImage' => null,
            ],
            [
                'bookTitle' => 'Bertemu di Temaram',
                'genre' => 'Puisi',
                'isbn' => '9786020530147',
                'author' => 'Boy Candra',
                'publicationYear' => '2019',
                'publisher' => 'Gramedia Widiasarana',
                'description' => '144 halaman',
                'synopsis' => 'Bertemu di Temaram menggambarkan perasaan seseorang yang terjebak dalam badai emosional, merindukan kehadiran orang yang dicintai. Dalam suasana hujan yang terus-menerus, Boy Candra menyampaikan harapan dan kerinduan yang mendalam, serta jarak yang dijaga antara diri sendiri dan orang tercinta.',
                'bookImage' => null,
            ],
            [
                'bookTitle' => 'Di Tanah Lada',
                'genre' => 'Fiksi',
                'isbn' => '9786231342485',
                'author' => 'Ziggy Zezsyazeoviennazabrizkie',
                'publicationYear' => '2015',
                'publisher' => 'KPG',
                'description' => '304 halaman',
                'synopsis' => 'Di Tanah Lada mengisahkan Salva, atau Ava, yang merasa tak diinginkan oleh ayahnya. Setelah pindah ke Rusun Nero, Ava bertemu dengan P, seorang anak yang pandai bermain gitar. Bersama, mereka menjalani petualangan yang membawa pembaca ke berbagai sisi kehidupan penuh kejutan.',
                'bookImage' => null,
            ],
            [
                'bookTitle' => 'Filosofi Teras',
                'genre' => 'Self Improvement',
                'isbn' => '9786233463034',
                'author' => 'Henry Manampiring',
                'publicationYear' => '2019',
                'publisher' => 'Penerbit Buku Kompas',
                'description' => '296 halaman',
                'synopsis' => 'Filosofi Teras memperkenalkan Stoisisme, filsafat Yunani-Romawi kuno yang membantu mengatasi emosi negatif dan membangun ketangguhan mental. Buku ini relevan bagi Generasi Milenial dan Gen Z, dengan pendekatan praktis dalam menghadapi kecemasan dan kekhawatiran.',
                'bookImage' => null,
            ],
        ]);

    }
}
