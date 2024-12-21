<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tailwind</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex justify-center items-center">
    <main class="bg-white p-8 rounded-lg shadow-md w-full max-w-md my-8">
        <h1 class="text-xl font-semibold mb-6 text-gray-700">Tambah Informasi</h1>
        <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="title" class="mb-1 text-gray-600 font-medium placeholder:text-slate-400">Judul</label>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" placeholder="Judul" />
            </div>

            <div class="flex flex-col">
                <label for="content" class="mb-1 text-gray-600 font-medium placeholder:text-slate-400">Isi</label>
                <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" placeholder="Isi" />
            </div>

                <button type="submit" class="px-4 py-2 w-full bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">Tambah</button>
        </form>
    </main>
</body>

</html>
