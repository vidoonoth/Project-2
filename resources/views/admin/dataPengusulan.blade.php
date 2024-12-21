<!-- resources/views/dashboard.blade.php -->
<x-app-admin-layout class="h-screen">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 h-full">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- @if (session('success'))
    <div class="bg-green-400 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif --}}
    <div id="content" class="flex h-full min-h-full max-h-full">
        @include('layouts.sidebarAdmin')
        <div class="px-[40px] w-[84%]">
                <div class="flex justify-between mt-8 mb-3 ">
                    <p class="text-xl font-semibold">Data Pengusulan</p>
                    <div class="flex flex-col gap-2 items-end">
                        <form action="{{ route('dataPengusulan') }}" method="GET" class="flex items-center ">
                            <input type="text" id="search" name="search" placeholder="Cari Data Usulan"
                                class="p-2 border border-blue-600 rounded-l-[50px] focus:outline-none focus:ring-2 focus:ring-blue-600 placeholder:text-[14px] placeholder:text-slate-400">
                            <button type="submit" class="p-2 w-full h-full bg-blue-600 hover:bg-blue-700 text-slate-50 font-medium rounded-r-md transition text-[14px]">
                                <svg class="" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48"><g fill="none" stroke="white" stroke-linejoin="round" stroke-width="4"><path d="M21 38c9.389 0 17-7.611 17-17S30.389 4 21 4S4 11.611 4 21s7.611 17 17 17Z"/><path stroke-linecap="round" d="M26.657 14.343A7.98 7.98 0 0 0 21 12a7.98 7.98 0 0 0-5.657 2.343m17.879 18.879l8.485 8.485"/></g></svg>
                            </button>
                        </form>
                        {{-- <a href="{{route('cetakPengusulan')}}" class="font-medium px-4 py-3 bg-blue-600 hover:bg-blue-700 text-slate-50 rounded-full text-[14px] dark:text-blue-500">
                            <p>Cetak data pengusulan</p>
                        </a> --}}
                    </div>
                </div>

                @if ($pengusulan->isEmpty())
                <div class="text-center h-[100px] my-[100px]">
                    <h1 class="text-lg font-medium text-gray-600">Tidak Ada Data Pengusulan</h1>
                </div>
                @else
                <div class="relative overflow-x-auto overflow-y-auto max-h-[350px] shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs bg-blue-600 w-full text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-slate-50 w-full">
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Username
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
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 border-l border-r border-blue-500">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="w-[2000px]">
                            @foreach ($pengusulan as $item)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-slate-100 even:dark:bg-gray-800 border-b border-slate-200 dark:border-gray-700">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->user->username }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($item->bookImage)
                                        <img src="{{ asset('storage/' . $item->bookImage) }}" class="object-cover w-[60px] h-[60px]" alt="gambar buku">
                                    @else
                                        <span class="text-gray-500">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    @if($item->isbn)
                                    {{ $item->isbn }}
                                    @else
                                        <span class="text-gray-500 font-medium">Tidak ada isbn</span>
                                    @endif                                    
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->bookTitle }}
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->author }}
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->genre }}
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->publicationYear }}
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->publisher }}
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->date }}
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    <p class="text-center {{ $item->status == 'diterima' ? 'bg-green-600 px-2 py-2 rounded-md text-white' : ($item->status == 'ditolak' ? 'bg-red-600 px-2 py-2 rounded-md text-white' : ($item->status == 'diproses' ? 'bg-blue-600 px-2 py-2 rounded-md text-white' : 'bg-yellow-500 px-2 py-2 rounded-md text-white')) }}">
                                        {{ $item->status }}
                                    </p>                                    
                                </td>
                                
                                <td class="px-6 py-4 flex gap-2 items-center justify-center">  
                                    <a href="{{ route('pengusulan.show', $item->id) }}" class="bg-blue-600 hover:bg-slate-200 font-medium text-slate-50 hover:text-blue-600 py-2 px-2 rounded-md dark:text-blue-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5"/>
                                        </svg>
                                    </a>                                  
                                    <a href="{{ route('editDataPengusulan', $item->id) }}"
                                       class="self-center font-medium text-[14px] hover:text-blue-600 text-slate-50 hover:bg-slate-200 bg-blue-400 py-2 px-2 dark:text-blue-500 text-center rounded-md">
                                        Edit
                                    </a>
                                    <form class="flex items-center gap-1 mt-3"
                                          action="{{ route('hapusDataPengusulan', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Anda Yakin Ingin Menghapusnya?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="font-medium text-[14px] hover:text-red-500 text-slate-50 hover:bg-slate-200 bg-red-500 py-2 px-2 dark:text-red-500 text-center rounded-md">
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


