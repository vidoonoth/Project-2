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
        <div class="px-[40px] w-[84%]">                

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
                            </tr>
                        </thead>
                        <tbody class="w-[2000px]">
                            @foreach ($pengusulan as $item)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-slate-100 even:dark:bg-gray-800 border-b border-slate-200 dark:border-gray-700">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($item->bookImage)
                                        <img src="{{ asset('storage/' . $item->bookImage) }}" alt="gambar buku">
                                    @else
                                        <span class="text-gray-500">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 border-l border-r border-slate-200">
                                    {{ $item->isbn }}
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
                                    {{ $item->status }}
                                </td>                            

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
        </div>

    </div>
    <script type="text/javascript">
        window.print();
    </script>
</x-app-admin-layout>


