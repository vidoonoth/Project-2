<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HomePage') }}
        </h2>
    </x-slot>


        <main class="pl-10 pr-10 mx auto flex flex-col">
            <div class="mt-11 mb-[200px]">
                <h1 class="border-b border-slate-950 w-fit mb-11 font-semibold">{{ $sejarah->title }}</h1>
                <p class="text-left indent-6">{{ $sejarah->content }}</p>
            {{-- <p class="text-left md:text-justify lg:text-justify xl:text-justify indent-6"> Peraturan Daerah Kabupaten Daerah tingkat II Indramayu No. 14 tahun 1994 tentang Organisasi dan Tata Kerja Kantor Arsip Daerah Kabupaten Daerah Tingkat II Indramayu. Peraturan Daerah  Kabupaten Daerah tingakat II Indramayu No.13 tahun 1995 tentang Organisasi dan Tata Kerja Kantor Arsip Daerah Kabupaten Daerah Tingkat II Indramayu. Kantor Arsip Daerah dibentuk pada tanggal 9 Januari 1997.</p><br>
            <p class="text-left md:text-justify lg:text-justify xl:text-justify indent-6">Pada tanggal 7 April 2001 disatukannya antara Kantor Arsip dan Perpustakaan Umum Daerah Kabupaten Daerah Tingkat II Indramayu yang berada dibawah dan bertanggung jawab langsung kepada Bupati melalui Sekretaris Daerah.Peraturan Daerah Nomor 19 Tahun 2002 tentang Penataan dan Pembentukan Lembaga Perangkat Daerah Kabupaten Indramayu.Keputusan Bupati Indramayu Nomor 26 Tahun 2002 tentang Organisasi dan Tata Kerja Kantor Arsip dan Perpustakaan Kabupaten Indramayu.</p><br>
            <p class="text-left md:text-justify lg:text-justify xl:text-justify indent-6">Berdasarkan Peraturan Daerah Kabupaten Indramayu Nomor 9 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Indramayu dan ditegaskan dalam Peraturan Bupati Indramayu No. 58 Tahun 2016 tentang Organisasi dan tata kerja Dinas Kerasipan dan Perpustakaan Kabupaten Indramayu. Berdasarkan Peraturan diatas yang semula Kantor Arsip dan Perpustakaan ditetapkan menjadi Dinas Kearsipan dan Perpustakaaan.</p> --}}
            </div>
        </main>
</x-app-layout>
