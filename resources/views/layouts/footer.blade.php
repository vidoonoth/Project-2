<nav x-data="{ open: false }" class=" w-full flex flex-col justify-between h-auto sm:h-[300px] bg-blue-400">
    <div class="flex gap-8 flex-col justify-between h-full px-4 sm:px-[36px] py-6 sm:py-[32px]">
        {{-- logo & lokasi --}}
        <div id="logo&lokasi" class="flex flex-col sm:flex-row justify-center sm:justify-between items-center gap-8 sm:gap-0">
            {{-- logo --}}
            <div class="w-full sm:w-[160px] hidden md:flex lg:flex xl:flex items center justify-center">
                <x-application-logo class="hover:text-gray-800 transition-all ease-linear duration-300 block h-9 fill-current dark:text-gray-200" />
            </div>

            {{-- lokasi --}}
            <div class="flex flex-col gap-1">
                <P class="text-center sm:text-right text-white text-base font-semibold">Lokasi<br/>Dinas Perpustakaan dan Arsip Kab.Indramayu<br/></P>
                <P class="text-center sm:text-right text-white text-sm font-normal">Jl. Mt Haryono No.49, Penganjang, Sindang, <br/>Kabupaten Indramayu, Jawa Barat 45222</P>
            </div>
        </div>

        {{-- kunjugi & hubungi --}}
        <div id="kunjungi&hubungi" class="flex flex-col sm:flex-row justify-center sm:justify-between items-center gap-8 sm:gap-0 mt-6 sm:mt-0">
            {{-- kunjungi --}}
            <div id="kunjungi" class="flex flex-col gap-1">
                <p class="text-center sm:text-left text-white text-base font-semibold">Kunjungi Website kami :</p>
                <p class="text-center sm:text-left text-white text-sm font-normal">https://disarpus.indramayukab.go.id/</p>
            </div>

            {{-- hubungi --}}
            <div class="flex flex-col gap-1">
                <P class="text-center sm:text-right text-white text-base font-semibold font-['Poppins']">Hubungi kami</P>
                <p class="text-center sm:text-right text-white text-sm font-medium font-['Poppins']">arpusindramayu7@gmail.com<br/>0234 - 277139</p>
            </div>
        </div>
    </div>

    <p class="bg-slate-950 text-center text-white text-sm py-[4px] font-medium font-['Poppins']">Copyright ©2024 All rights reserved |  design by Disarpus Kab. Indramayu IT Team</p>
</nav>
