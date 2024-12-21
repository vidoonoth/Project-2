
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan Indramayu') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        .gradient-bg {
            background: linear-gradient(to right, rgba(15, 23, 42, 1) 49%, rgba(162, 113, 240, 0) 100%);
        }

        * {
            font-family: 'Poppins';
        }

        input[type="search"]::-webkit-search-results-button {
            -webkit-appearance: none;
            appearance: none;
        }

        input[type="search"]::-webkit-search-decoration {
            display: none;
        }

        input[type="search"]::-webkit-search-results-decoration {
            display: none;
        }

        input[type="search"]::-webkit-search-cancel-button {
            display: none;
        }
        details::-webkit-details-marker {
            display: none; /* Menghilangkan ikon default pada Webkit (Chrome, Safari) */
        }
        .scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .scrollbar::-webkit-scrollbar-thumb {
            background-color: #60a5fa;
            border-radius: 10px;
            border: 2px solid #f1f1f1;
        }
        .scrollbar::-webkit-scrollbar-thumb:hover {
            background: #4594f4;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased  bg-gray-100 dark:bg-gray-900">
    <div class="w-full">
        <div class=""></div>
        {{-- <!-- Page Heading -->
            @isset($header)
                <header class="bg-blue-400 dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

        <!-- Page Content -->
        <main class="px-8 py-8 min-h-screen ">
            <div id="back" class="flex items-center gap-4 mb-10">
                <button onclick="history.back()" class="">
                    <i class="transition-colors duration-300 hover:bg-blue-400 hover:text-blue-50 px-2 py-5 rounded-md fa-solid fa-arrow-left fa-2xl" style="color: black;" onmouseover="this.style.color='white';" onmouseout="this.style.color='black';"></i>
                </button>
                <p class="text-xl font-medium w-fit border-b border-slate-950">Notifikasi Pengusulan</p>
            </div>

        @if($notifikasi->isEmpty())
            <p class="font-semibold flex justify-center items-center text-center m-auto text-slate-950 h-[70%]">Tidak ada pemberitahuan.</p>
        @else
        @foreach($notifikasi as $notif)
            <div id="card" class="flex flex-col gap-3 my-4 bg-slate-50 shadow-sm border border-slate-200 px-4 py-4 rounded-md text-slate-950">                
                <div class="flex gap-3 {{ $notif->data['status'] == 'diproses' ? 'bg-blue-500' : ''}} w-fit py-2 px-2 text-slate-50 rounded-md mb-3 font-semibold">                    
                    <p>{{ $notif->data['status'] ?? 'Tidak ada status' }}</p>
                </div>

                <ul>
                    <li class="flex gap-3 text-inherit">
                        <p class="font-semibold">Userame : </p>
                        <p>{{ $notif->data['username'] ?? 'Tidak ada username' }}</p>
                    </li>
                    <li class="flex gap-3">
                        <p class="font-semibold">Nama : </p>
                        <p>{{ $notif->data['name'] ?? 'Tidak ada nama' }}</p>
                    </li>
                    <li class="flex gap-3">
                        <p class="font-semibold">Judul Buku : </p>
                        <p>{{ $notif->data['bookTitle'] ?? 'Tidak ada judul buku' }}</p>
                    </li>
                    <li class="flex gap-3">
                        <p class="font-semibold">Isbn : </p>
                        <p>{{ $notif->data['isbn'] ?? 'Tidak ada isbn' }}</p>
                    </li>
                    <li class="flex gap-3">
                        <p class="font-semibold text-slate-950">Status Pengusulan: </p>
                        <p>{{ $notif->data['status'] ?? 'Tidak ada status' }}</p>
                    </li>                
                    <li class="flex gap-3">
                        <p class="font-semibold">Pesan : </p>
                        <p>{{ $notif->data['message'] ?? 'Tidak ada pesan' }}</p>
                    </li>
                </ul>                
                {{-- <div class="flex gap-3">
                    <form action="{{ route('hapusNotif', $notif->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus notifikasi ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-medium py-2 px-2 rounded-lg w-[200px]">
                            Hapus Pesan
                        </button>
                    </form>
                </div> --}}

            </div>
        @endforeach
        @endif

        </main>
        @include('layouts.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>







</body>

</html>
