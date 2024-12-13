<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'username' => 'a',
                'name'=> 'a',
                'email' => 'a@gmail.com',
                'numberphone' => '0879923',
                'nik' => '232131',
                'gender' => 'perempuan',
                'password' => '12345678',
                // 'bookImage' => 'images/atomic.jpg',
                // 'description' => 'nothing',
            ]
        ]);
    }
}
