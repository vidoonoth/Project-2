<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('homePage') }}
        </h2>
    </x-slot>

    <main class="w-full pl-14 pt-8">
        {{-- <h1 class="w-fit border-b border-slate-950 mb-5 font-semibold text-xl">{{ $visiMisi->title }}</h1> --}}
        <h1 class="w-fit border-b border-slate-950 mb-5 font-semibold text-xl">Visi Misi</h1>
        <div class="mb-5 flex flex-col gap-2">
            <h2 class="font-medium text-lg">Visi :</h2>
            {{-- <p>{{ $visiMisi->content }}</p> --}}
            <p>“Terwujudnya lembaga Perpustakaan Daerah dan Kearsipan daerah yang unggul pada tahun 2026”</p>
        </div>

        <div class="flex flex-col gap-2 mb-6    ">
                <h2 class="font-medium text-lg">Misi:</h2>
            <ol class="list-decimal ml-6 font-normal flex flex-col gap-3">
                <li>Meningkatkan Sumber Daya Manusia Pengelola Arsip dan Pengelola Perpustakaan</li>
                <li>Meningkatkan Koordinasi Pengelolaan Arsip dan Pengelolaan Perpustakaan</li>
                <li>Meningkatkan Kebermanfaatan Arsip untuk SKPD;</li>
                <li>Meningkatkan Sarana dan Prasarana Kearsipan dan Perpustakaan;</li>
                <li>Meningkatkan Fungsi dan Tanggungjawab Kearsipan Statis.</li>
                <li>Meningkatkan Kompetensi Sumber Daya Manusia Perpustakaan;</li>
                <li>Meningkatkan Sarana Prasarana Perpustakaan;</li>
                <li>Meningkatan Pelayanan Kearsipan dan Perpustakaan;</li>
                <li>Meningkatkan Pembinaan terhadap Perpustakaan;</li>
                <li>Mengembangkan Minat, Gemar dan Budaya Membaca.</li>
            </ol>
      </div>
    </main>
</x-app-layout>
