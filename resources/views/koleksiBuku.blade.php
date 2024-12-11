<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-32 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('homePage') }}
        </h2>
    </x-slot>

    <div class="flex justify-between mt-8 px-7 ">
        <h1 class="border-b w-fit h-fit border-slate-950 font-semibold text-xl ">Koleksi Buku</h1>
        <form action="{{ route('koleksiBuku') }}" method="GET" class="flex items-center ">
            <input type="text" id="search" name="search" placeholder="Cari Buku"
                class="p-2 border border-blue-400 rounded-l-[50px] focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder:text-[14px] placeholder:text-slate-400">
            <button type="submit" class="p-2 w-full h-full bg-blue-400 text-slate-50 font-medium rounded-r-md hover:bg-blue-500 transition text-[14px]">
                <svg class="" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48"><g fill="none" stroke="white" stroke-linejoin="round" stroke-width="4"><path d="M21 38c9.389 0 17-7.611 17-17S30.389 4 21 4S4 11.611 4 21s7.611 17 17 17Z"/><path stroke-linecap="round" d="M26.657 14.343A7.98 7.98 0 0 0 21 12a7.98 7.98 0 0 0-5.657 2.343m17.879 18.879l8.485 8.485"/></g></svg>
            </button>
        </form>
    </div>


    @if($books->isEmpty())
    <p class="text-center my-[200px] text-[20px]">Buku Tidak Tersedia.</p>
    @else
    <div class="cards my-[20px] flex flex-wrap gap-[30px] mt-8 px-5 justify-center">
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


    {{-- <div class="cards my-[20px] flex flex-wrap gap-[30px] mt-8 px-5 justify-center">
        <div id="buku1" class="" >
            <x-card
                bookImage="atomic.jpg"
                bookTitle="Atomic Habits"
                isbn="9786020667188"
                genre="Self Improvement"
                author="James Clear"
                yearPublication="gak tau"
                publisher="Gramedia Pustaka utama"
                description="Deskripsi singkat tentang buku 1."
            />
        </div>
    </div> --}}

    {{--     <div id="buku2" class="col-md-4">
            <x-card
                bookImage="devotion.jpeg"
                bookTitle="The Devotion of Suspect X"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku3" class="col-md-4">
            <x-card
                bookImage="pelajaran.jpeg"
                bookTitle="Pelajaran Menyetir"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku4" class="col-md-4" >
            <x-card
                bookImage="filosofi.jpeg"
                bookTitle="Filosofi Teras"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku5" class="col-md-4" >
            <x-card
                bookImage="laut.jpg"
                bookTitle="Laut Bercerita"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku6" class="col-md-4" >
            <x-card
                bookImage="ratu.jpeg"
                bookTitle="Ratu Adil"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku7" class="col-md-4" >
            <x-card
                bookImage="hidup.jpeg"
                bookTitle="Hidup tetap berjalan dan kita telah lupa alasannya"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku8" class="col-md-4" >
            <x-card
                bookImage="hujan.jpeg"
                bookTitle="Hujan"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Tere Liye"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku9" class="col-md-4" >
            <x-card
                bookImage="tanah.jpeg"
                bookTitle="Di Tanah Lada"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku10" class="col-md-4" >
            <x-card
                bookImage="aroma.jpeg"
                bookTitle="Aroma Karsa"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku11" class="col-md-4" >
            <x-card
                bookImage="rempah.jpeg"
                bookTitle="Rempah Rempah"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku12" class="col-md-4" >
            <x-card
                bookImage="principles.jpeg"
                bookTitle="The Principles Of Power"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku13" class="col-md-4" >
            <x-card
                bookImage="bertemu.jpeg"
                bookTitle="Bertemu di Temaram"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku14" class="col-md-4" >
            <x-card
                bookImage="ikan.jpeg"
                bookTitle="Semua Ikan di Langit"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku15" class="col-md-4" >
            <x-card
                bookImage="psychology.jpeg"
                bookTitle="The pyschology of Money"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku16" class="col-md-4" >
            <x-card
                bookImage="amba.jpeg"
                bookTitle="Amba"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku17" class="col-md-4" >
            <x-card
                bookImage="sebuah.jpeg"
                bookTitle="Sebuah Seni untuk Bersikap Bodo Amat"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku18" class="col-md-4" >
            <x-card
                bookImage="asing.jpeg"
                bookTitle="Bumi Asing"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku19" class="col-md-4" >
            <x-card
                bookImage="ronggeng.jpeg"
                bookTitle="Ronggeng Dukuh Paruk"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div>

        <div id="buku20" class="col-md-4" >
            <x-card
                bookImage="alkemis.jpeg"
                bookTitle="Sang Alkemis"
                isbn="123-4567890124"
                genre="Non-Fiksi"
                author="Nama Penulis 2"
                yearPublication="2022"
                publisher="Nama Penerbit 2"
                description="Deskripsi singkat tentang buku 2."
            />
        </div> --}}


    </div>
</x-app-layout>
