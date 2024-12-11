<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-32 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('homePage') }}
        </h2>
    </x-slot>

        <div class="hero relative pl-12 text-left w-full h-screen bg-cover text-slate-50 flex flex-col gap-10 justify-center"
            style="background-image: url('{{ asset('images/thumbnailHomePage.jpg') }}');">
            <div
                class="absolute right-0 left-0 top-0 bottom-0 opacity-60 bg-gradient-to-r from-slate-900 to-transparent">
            </div>
            <p class=" z-10 font-bold text-5xl w-3/5">Selamat datang di <br> Perpustakaan <br> Indramayu</p>
            <p class="z-10 italic">“Ada banyak jalan untuk merubah nasib kita. <br> Salah satunya adalah dengan memanfaatkan
                <br> Perpustakaan Indramayu”
            </p>
        </div> {{-- <img class="w-full h-96" src="{{ asset('images/thumbnailHomePage.jpg') }}" alt="thumbnail"> --}}

    <div class="pl-11 mt-12">
        <p class="text-xl font-medium w-fit border-b border-slate-950">Rekomendasi Buku</p>
    </div>
    <div class="h-[630px] flex flex-col gap-8 justify-center pl-[130px] pr-[130px] ">
        <div class="">
            <h1 class="text-xl mb-11 font-medium w-fit border-b border-slate-950">Pengusulan</h1>
            <div class="flex justify-between">
                <div class="flex flex-col gap-9">
                    <h1 class="font-semibold text-3xl">Pengusulan Judul Buku <br> Perpustakaan <br> Indramayu</h1>
                    <p class="">Mari kita memberikan aspirasi dan ide-ide <br> kalian kepada Perpustakaan Indramayu, <br> agar kita dapat berkontribusi dalam <br> pengembangan layanan dan fasilitas <br> yang lebih baik, serta meningkatkan <br> pengalaman membaca.</p>

                    @if (Route::has('login'))
                    @if (Route::has('register'))
                    @auth
                    <a class="" href="{{ route('pengusulan.store') }}">
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
                <div class="">
                    <img class="h-96 rounded-lg" src="{{ asset('images/thumbnailPengusulan.jpg') }}" alt="pengusulan">
                </div>
            </div>
        </div>
    </div>
    <div class="pl-[92px] pr-[92px] mb-14 mt-10">
        <p class="text-xl mb-11 font-medium w-fit border-b border-slate-950">Lokasi</p>
        <div class="flex gap-11 justify-center items-center">
            <div class="">
                <iframe class="h-[400px] w-[500px] rounded-[20px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.498369597526!2d108.31805033785965!3d-6.329410544580129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb959b97b9975%3A0x56b333828a7c4ce8!2sDinas%20Perpustakaan%20dan%20Arsip%20Kabupaten%20Indramayu!5e0!3m2!1sid!2sid!4v1713875921538!5m2!1sid!2sid" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="">
                <p class="text-2xl font-semibold">Lokasi Perpustakaan Indramayu </p>
                <p>Jl. Mt Haryono No.49, Penganjang, Sindang, <br> Kabupaten Indramayu, Jawa Barat 45222 <br> Telp. (021) 9172638 <br> Fax. (021) 9172638</p>
            </div>
        </div>

    </div>
</x-app-layout>

