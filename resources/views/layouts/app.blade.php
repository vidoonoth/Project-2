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
        /* #edit-show-delete{
            display: flex;
            margin: auto;
        } */

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
            height: 18px; 
        }
        .scrollbar::-webkit-scrollbar-track {
            background: #d3d3d3;
            border-radius: 10px;
        }
        .scrollbar::-webkit-scrollbar-thumb {
            background-color: #60a5fa;
            border-radius: 10px;
            border: 2px solid #f1f1f1;
        }
        .scrollbar::-webkit-scrollbar-thumb:hover {
            background: #4594f4;
        }
        .scrollbar-pengusulan::-webkit-scrollbar {
            width: 16px;
        }
        .scrollbar-pengusulan::-webkit-scrollbar-track {
            background: #cfcfcf;
            border-radius: 10px;
        }
        .scrollbar-pengusulan::-webkit-scrollbar-thumb {
            background-color: #60a5fa;
            border-radius: 10px;
            border: 2px solid #f1f1f1;
        }
        .scrollbar-pengusulan::-webkit-scrollbar-thumb:hover {
            background: #4594f4;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased  bg-gray-100 dark:bg-gray-900">
    <div class="w-full">
        @include('layouts.navigation')
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
        <main class="">
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <script>
        
        setTimeout(() => {
            const notification = document.getElementById('notifikasi-berhasil');
            console.log('Animasi dimulai');
            notification.classList.add('opacity-0', '-translate-y-[100px]'); // Animasi hilang dan pergeseran

            // Menunggu hingga animasi selesai dan menghapus elemen
            notification.addEventListener('transitionend', () => {
                console.log('Animasi selesai, menghapus elemen');
                notification.remove(); // Menghapus elemen dari DOM setelah animasi selesai
            });
        }, 2000); // Tunggu 2 detik sebelum memulai animasi


        $(document).ready(function(){
            let prevScrollpos = window.pageYOffset;

            $(window).on("scroll", function() {
                const currentScrollPos = window.pageYOffset;

                if (prevScrollpos > currentScrollPos) {
                    $("nav").css("top", "0");
                } else {
                    $("nav").css("top", "-100px");
                }
                prevScrollpos = currentScrollPos;
            });
        });


        // // Menghilangkan notifikasi setelah beberapa detik
        // setTimeout(() => {
        //     const notification = document.getElementById('success-notification');
        //     notification.classList.add('opacity-0', 'translate-y-8');
        // }, 3000); // Menghilangkan setelah 3 detik

        // Menyembunyikan notifikasi setelah 3 detik
        // setTimeout(() => {
        //     const notification = document.getElementById('success-notification');
        //     console.log('Notifikasi akan menghilang'); // Debugging log
        //     notification.classList.add('opacity-0', 'translate-y-8'); // Animasi hilang
        // }, 3000); // Notifikasi akan hilang setelah 3 detik

    </script>

</body>

</html>
