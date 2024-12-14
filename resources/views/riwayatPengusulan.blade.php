<x-app-layout>
    <div class="w-full flex justify-between items-center mt-8 pl-2 md:pl-11 lg:pl-11 xl:pl-11 pr-2 md:pr-24 lg:pr-24 xl:pr-24">
        <div class="">
            <p class="text-xl font-medium w-fit border-b border-slate-950">Riwayat Pengusulan</p>
        </div>

        <div class="flex gap-8 md:flex lg:flex xl:flex items-end md:items-center lg:items-center xl:items-center md:gap-8 lg:gap-8 xl:gap-8">
            <form action="{{ route('pengusulan.index') }}" method="GET" class="flex items-center ">
                    <input type="text" id="search" name="search" placeholder="Cari riwayat pengusulan"
                        class="p-2 border border-blue-400 rounded-l-[50px] focus:outline-none focus:ring-2 focus:ring-blue-400 placeholder:text-[14px] placeholder:text-slate-400">
                <button type="submit" class="p-2 w-full h-full bg-blue-400 text-slate-50 font-medium rounded-r-md hover:bg-blue-500 transition text-[14px]">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 48 48"><g fill="none" stroke="white" stroke-linejoin="round" stroke-width="4"><path d="M21 38c9.389 0 17-7.611 17-17S30.389 4 21 4S4 11.611 4 21s7.611 17 17 17Z"/><path stroke-linecap="round" d="M26.657 14.343A7.98 7.98 0 0 0 21 12a7.98 7.98 0 0 0-5.657 2.343m17.879 18.879l8.485 8.485"/></g></svg>
                </button>
            </form>



            <a href="{{ route('pengusulan.create') }}" class="addUsulan flex items-center justify-around gap-1 h-[40px] w-[190px] pl-2 rounded-2xl bg-blue-400 hover:bg-blue-500 hover:text-blue-400" >
                <p class="text-slate-50 text-sm">Tambah Usulan</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="white" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2"/></svg>
            </a>
        </div>
    </div>


    @if (session('success'))
    <div id="notifikasi-berhasil" class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-5 w-full max-w-sm p-4 bg-green-500 text-white rounded-lg shadow-lg flex items-center space-x-3 opacity-100 transition-opacity duration-500 ease-in-out z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <div>
            <p class="text-sm font-semibold">{{ session('success') }}</p>
        </div>
    </div>
    @endif




    @if ($pengusulan->isEmpty())
        <div class="text-center h-[100px] my-[160px]">
            <h1 class="text-lg font-medium text-gray-600">Tidak ada riwayat pengusulan</h1>
        </div>
    @else
        <div class="relative mt-[80px] mb-[180px] rounded-lg max-w-[95%] h-[300px] scrollbar-pengusulan overflow-y-auto overflow-x-auto m-auto">
            <table class="bg-white rounded-lg shadow-md m-auto w-full overflow-scroll">
                <thead class="bg-blue-400 text-white rounded-lg w-full">
                    <tr class="rounded-lg w-full">
                        <th scope="col" class="px-4 py-2 text-center text-[14px] font-medium rounded-sm">No</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Judul Buku</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Genre</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">ISBN</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Penulis</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Tahun Terbit</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Penerbit</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Tanggal Usulan</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Gambar Buku</th>
                        <th scope="col" class="px-4 py-2 text-left text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Status</th>
                        <th scope="col" class="px-4 py-2 text-center text-[14px] font-medium border-l border-r border-slate-200 rounded-sm">Aksi</th> <!-- Mengubah text-left ke text-center -->
                    </tr>
                </thead>
                <tbody class="w-[1000px]">
                    @foreach ($pengusulan as $item)
                        <tr class="border-b border-slate-200 hover:bg-gray-100">
                            <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td> <!-- Menambah text-center -->
                            <td class="px-4 py-2 border-l border-r border-slate-200">{{ $item->bookTitle }}</td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">{{ $item->genre }}</td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">{{ $item->isbn }}</td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">{{ $item->author }}</td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">{{ $item->publicationYear }}</td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">{{ $item->publisher }}</td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">{{ $item->date }}</td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">
                                @if($item->bookImage)
                                    <img src="{{ asset('storage/'.$item->bookImage) }}" alt="Gambar Buku" class="w-[100px] h-[100px] object-cover rounded">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="px-4 py-2 border-l border-r border-slate-200">
                                <p class="text-center {{ $item->status == 'diterima' ? 'bg-green-600 px-2 py-2 rounded-md text-white' : ($item->status == 'ditolak' ? 'bg-red-600 px-2 py-2 rounded-md text-white' : ($item->status == 'diproses' ? 'bg-blue-600 px-2 py-2 rounded-md text-white' : 'bg-yellow-500 px-2 py-2 rounded-md text-white')) }}">
                                    {{ $item->status }}
                                </p>
                            </td>
                            <td id="edit-show-delete" class="px-4 py-10 flex gap-2 items-center"> 
                                <a href="{{ route('pengusulan.edit', $item->id) }}" class="font-medium text-[14px] hover:text-blue-600 text-slate-50 hover:bg-slate-200 bg-blue-400 py-1 px-1 dark:text-blue-500 text-center rounded-md">Edit</a>
                                <form action="{{ route('pengusulan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Anda Yakin Ingin Menghapusnya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-[14px] hover:text-red-500 text-slate-50 hover:bg-slate-200 bg-red-500 py-1 px-1 dark:text-red-500 text-center rounded-md">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    @endif


</x-app-layout>
