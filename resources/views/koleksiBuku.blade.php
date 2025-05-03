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
            {{-- <x-card
                bookImage="{{ $book->bookImage }}"
                bookTitle="{{ $book->bookTitle }}"
                isbn="{{ $book->isbn }}"
                genre="{{ $book->genre }}"
                author="{{ $book->author }}"
                yearPublication="{{ $book->publicationYear }}"
                publisher="{{ $book->publisher }}"
                description="{{ $book->description }}"
                synopsis="{{$book->synopsis}}"
            /> --}}           
        <div class="card flex flex-col bg-slate-100 shadow shadow-slate-300 w-[280px] h-fit {{-- h-[638px] --}} rounded-[20px] items-center py-5 px-5 text-left">
                <img class="card-img-top w-[170px] rounded-[10px]" src="{{ asset('storage/' . $book->bookImage) }}" alt="Book Image">
        
            <div class="card-body">
                <div class=" text-center flex flex-col items-center gap-2 my-5">
                    <p class="card-title font-semibold">{{ $book->bookTitle }}</p>
                    <p class="card-text w-fit bg-slate-300 py-1 px-2 rounded-md">{{ $book->genre }}</p>
                </div>
                <details class="cursor-pointer">
                    <summary class="cursor-pointer">Detail</summary>
                    <p class="card-text"><span class="font-semibold">ISBN:</span> {{ $book->isbn }}</p>
                    <p class="card-text"><span class="font-semibold">Penulis: </span> {{ $book->author }}</p>
                    <p class="card-text"><span class="font-semibold">Tahun Terbit: </span> {{ $book->publicationYear}}</p>
                    <p class="card-text"><span class="font-semibold">Penerbit: </span>{{ $book->publisher }}</p>
                    <p class="card-text"><span class="font-semibold">Halaman:</span> {{ $book->description }} halaman</p>
                    <p class="card-text"><span class="font-semibold">Sinopsis:</span> {{ $book->synopsis }}</p>
        
                </details>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    </div>
</x-app-layout>
