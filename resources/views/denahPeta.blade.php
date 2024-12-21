<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HomePage') }}
        </h2>
    </x-slot>

    <main class="pt-5 pl-6 pr-6 w-full">
        <h1 class="border-b border-slate-950 w-fit mb-6 font-semibold">Denah & Peta</h1>
        <div class="flex flex-col justify-center items-center gap-3 mb-[40px]">
            <p>Jl. Mt Haryono No.49, Penganjang, Sindang, Kabupaten Indramayu, Jawa Barat 45222</p>
            <iframe class="h-[400px] w-[400px] md:h-[400px] lg:h-[400px] xl:h-[400px] xl:w-[600px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.498369597526!2d108.31805033785965!3d-6.329410544580129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb959b97b9975%3A0x56b333828a7c4ce8!2sDinas%20Perpustakaan%20dan%20Arsip%20Kabupaten%20Indramayu!5e0!3m2!1sid!2sid!4v1713875921538!5m2!1sid!2sid" width="600" height="900" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p class="text-center">atau bisa klik & salin link, kemudian buka pada browser <br><a class="font-semibold text-blue-400 hover:text-blue-700 active:text-blue-900" href="https://maps.app.goo.gl/xuJhc7pMpFYmMfSH7">https://maps.app.goo.gl/xuJhc7pMpFYmMfSH7</a></p>
        </div>
    </main>
</x-app-layout>
