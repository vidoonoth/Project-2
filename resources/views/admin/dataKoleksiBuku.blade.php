<!-- resources/views/dashboard.blade.php -->
<x-app-admin-layout class="h-screen">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 h-full">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="content" class="flex h-full min-h-full max-h-full">
        @include('layouts.sidebarAdmin')
        <div class="px-[40px] w-[84%]">
            {{-- @if (session('success'))
            <div id="notifikasi-berhasil" class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-5 w-full max-w-sm p-4 bg-green-500 text-white rounded-lg shadow-lg flex items-center space-x-3 opacity-100 transition-opacity duration-500 ease-in-out z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <div>
                    <p class="text-sm font-semibold">{{ session('success') }}</p>
                </div>
            </div>
            @endif --}}

                <div class="flex justify-between items-center mt-6">
                    <p class="text-xl font-semibold">Data Koleksi Buku</p>
                    <div class="flex flex-col gap-6">
                    </div>
                </div>

                <div class="flex justify-between items-center mt-4">
                    <form action="{{ route('books.index') }}" method="GET" class="flex items-center ">
                        <input type="text" id="search" name="search" placeholder="Cari Data Buku"
                            class="p-2 border border-blue-600 rounded-l-[50px] focus:outline-none focus:ring-2 focus:ring-blue-600 placeholder:text-[14px] placeholder:text-slate-400">
                        <button type="submit" class="p-2 w-full h-full bg-blue-600 text-slate-50 font-medium rounded-r-md hover:bg-blue-500 transition text-[14px]">
                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48"><g fill="none" stroke="white" stroke-linejoin="round" stroke-width="4"><path d="M21 38c9.389 0 17-7.611 17-17S30.389 4 21 4S4 11.611 4 21s7.611 17 17 17Z"/><path stroke-linecap="round" d="M26.657 14.343A7.98 7.98 0 0 0 21 12a7.98 7.98 0 0 0-5.657 2.343m17.879 18.879l8.485 8.485"/></g></svg>
                        </button>
                    </form>
                    <div class="bg-blue-600 hover:bg-blue-700 px-3 py-2 w-fit h-[40px] flex justify-center items-center rounded-xl">
                        <a href="{{ route('books.create') }}" class="text-slate-50">Tambah Buku</a>
                    </div>
                </div>

                @if ($books->isEmpty())
                <div id="if->table=empty" class="text-center h-[100px] my-[100px]">
                    <h1 class="text-lg font-medium text-gray-600">Tidak Ada Data Buku</h1>
                </div>
                @else
                <div id="isi-tabel" class="relative overflow-x-auto overflow-y-auto max-h-[320px] shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-scroll">
                        <thead class="text-xs bg-blue-600 w-full text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-slate-50 w-full">
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Gambar Buku
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Isbn
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Judul Buku
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Pengarang
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Tahun Terbit
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Penerbit
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Sinopsis
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="w-[2000px]">
                            @foreach ($books as $book)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-slate-100 even:dark:bg-gray-800 border-b border-slate-200 dark:border-gray-700">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 font-medium text-gray-900 dark:text-white border-l border-r border-slate-200">
                                    <img class="w-[100px] h-[100px]" src="{{ asset('storage/' . $book->bookImage) }}" alt="gambar buku">
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200">
                                    {{ $book->isbn }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200">
                                    {{ $book->bookTitle }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200">
                                    {{ $book->author }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200">
                                    {{ $book->genre }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200">
                                    {{ $book->publicationYear }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200">
                                    {{ $book->publisher }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200 ">
                                    {{ $book->description }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200 ">
                                    {{ $book->synopsis }}
                                </td>
                                <td class="px-6 py-2 border-l border-r border-slate-200 ">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Anda Yakin Ingin Menghapusnya?');">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit"
                                              class="text-red-500 hover:underline">
                                          Hapus
                                      </button>
                                    </form>
                                </td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
        </div>

    </div>
</x-app-admin-layout>


