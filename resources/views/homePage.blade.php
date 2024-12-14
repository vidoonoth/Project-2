<x-app-layout class="">
    <x-slot name="header">
        <h2 class="mt-32 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('homePage') }}
        </h2>
    </x-slot>

    {{-- <div class="w-full">
        <div class="w-full text-black bg-slate-600 hidden md:hidden xl:hidden lg:block">ini lg</div>
        <div class="w-full text-black bg-slate-600 hidden md:hidden xl:block lg:hidden">ini xl</div>
        <div class="w-full text-black bg-slate-600 hidden md:block xl:hidden lg:hidden">ini md</div>
        <div class="w-full text-black bg-slate-600 block md:hidden xl:hidden lg:hidden">ini sm</div>
    </div> --}}
    <div class="hero relative pl-12 text-left w-full h-screen bg-cover text-slate-50 flex flex-col gap-10 justify-center" style="background-image: url('{{ asset('images/thumbnailHomePage.jpg') }}');">
        <div class="absolute right-0 left-0 top-0 bottom-0 opacity-60 bg-gradient-to-r from-slate-900 to-transparent"></div>
        <p class=" z-10 font-bold text-4xl md:text-5xl lg:text-5xl xl:text-5xl w-4/5 md:w-4/5 lg:4/5 xl:w-4/5">Selamat datang di <br> Perpustakaan <br> Indramayu</p>
        <p class="z-10 italic">“Ada banyak jalan untuk merubah nasib kita. <br> Salah satunya adalah dengan memanfaatkan
            <br> Perpustakaan Indramayu”
        </p>
    </div>

    {{-- books collection --}}
    <div id="bookCollection" class="pl-11 pr-7 mt-12">
        <div class="flex justify-between">
            <h1 class="text-xl font-medium w-fit border-b border-slate-950">Koleksi Buku</h1>
            @if (Route::has('login'))
            @if (Route::has('register'))
            @auth
                <a href="{{ route('koleksiBuku') }}" class="bg-blue-400 text-center py-2 px-2 text-white hover:bg-blue-500 rounded-lg text-[14px]">Lihat Selengkapnya</a>
            @else
            <a href="{{ route('login') }}" class="bg-blue-400 text-center py-2 px-2 text-white hover:bg-blue-500 rounded-lg">Lihat Selengkapnya</a>
            @endauth
            @endif
            @endif
        </div>

        <div class="scrollbar h-fit cards my-[20px] flex w-full gap-[30px] mt-8 overflow-scroll ">
            @if($books->isEmpty())
                <p class="text-center my-[200px] text-[20px]">Buku Tidak Tersedia.</p>
            @else
            <div class="cards my-[10px] flex gap-[30px] mt-8 justify-center">
            @foreach ($books as $book)
                <x-card
                    bookImage="{{ $book->bookImage }}"
                    bookTitle="{{ $book->bookTitle }}"
                    isbn="{{ $book->isbn }}"
                    genre="{{ $book->genre }}"
                    author="{{ $book->author }}"
                    yearPublication="{{ $book->publicationYear }}"
                    publisher="{{ $book->publisher }}"
                    description="{{ $book->description }}"
                    synopsis="{{ $book->synopsis }}"
                />
            @endforeach
            </div>
            @endif
        </div>
    </div>

    {{-- pengusulan --}}
    <div id="pengusulan" class="h-[630px] flex flex-col md:my-0 lg:my-0 gap-8 justify-center px-11">
            <h1 class="text-xl mb-6 font-medium w-fit border-b border-slate-950">Pengusulan</h1>

            <div id="kalimat & gambar" class="md:flex lg:flex xl:flex justify-around">
                <div id="kalimat" class="flex flex-col gap-9">
                    <h1 class="font-semibold text-2xl md:text-3xl lg:text-3xl xl:text-3xl w-auto">Pengusulan Judul Buku <br> Perpustakaan <br> Indramayu</h1>
                    <p class="">Mari kita memberikan aspirasi dan ide-ide <br> kalian kepada Perpustakaan Indramayu, <br> agar kita dapat berkontribusi dalam <br> pengembangan layanan dan fasilitas <br> yang lebih baik, serta meningkatkan <br> pengalaman membaca.</p>
                    @if (Route::has('login'))
                    @if (Route::has('register'))
                    @auth
                    <a class="" href="{{ route('pengusulan.create') }}">
                        <x-secondary-button class=" rounded-[50px] w-[230px] h-[50px] text-center items-center ">
                        {{ __('Mulai') }}
                        </x-secondary-button>

                    </a>
                    @else
                    <a class="" href="{{ route('login') }}">
                        <x-secondary-button class=" rounded-[50px] w-[230px] h-[50px] text-center items-center ">
                        {{ __('Mulai') }}
                        </x-secondary-button>
                    </a>
                    @endauth
                    @endif
                    @endif
                </div>
                <img class="hidden md:block lg:block xl:block md:h-96 lg:h-96 xl:h-96 rounded-lg" src="{{ asset('images/thumbnailPengusulan.jpg') }}" alt="pengusulan">
            </div>
    </div>

    {{-- lokasi --}}
    <div id="lokasi" class="px-11 py-8 mb-[200px]">
        <p class="text-lg sm:text-xl mb-6 sm:mb-8 font-medium w-fit border-b border-slate-950">Lokasi</p>

        <div id="kalimat&lokasi" class="flex flex-col md:flex-row gap-8 md:gap-12 items-center">
            <iframe id="gambar" class="h-[300px] w-[400px] md:h-[400px] md:w-[500px] lg:h-[400px] lg:w-[500px] xl:h-[400px] xl:w-[500px] rounded-[20px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.498369597526!2d108.31805033785965!3d-6.329410544580129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb959b97b9975%3A0x56b333828a7c4ce8!2sDinas%20Perpustakaan%20dan%20Arsip%20Kabupaten%20Indramayu!5e0!3m2!1sid!2sid!4v1713875921538!5m2!1sid!2sid" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="w-full md:w-1/2">
                <p class="text-xl sm:text-2xl font-semibold mb-4">Lokasi Perpustakaan Indramayu</p>
                <p class="text-sm sm:text-base">
                    Jl. Mt Haryono No.49, Penganjang, Sindang, <br>
                    Kabupaten Indramayu, Jawa Barat 45222 <br>
                    Telp. (021) 9172638 <br>
                    Fax. (021) 9172638
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
