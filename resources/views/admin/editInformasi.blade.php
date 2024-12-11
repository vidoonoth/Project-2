<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tailwind</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <main class="bg-slate-50 p-8 rounded-lg shadow-md w-full max-w-md my-8">
        <h1 class="text-xl font-semibold mb-6 text-gray-700">Edit Informasi</h1>
        <form action="{{ route('informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Judul Field -->
            <div class="flex flex-col">
                <x-input-label for="title" :value="__('Judul')" class="text-slate-950"/>
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $informasi->title)" required autofocus placeholder="Judul" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Isi Field -->
            <div class="flex flex-col">
                <x-input-label for="content" :value="__('Isi')" class="text-slate-950"/>
                <x-text-input id="content" class="block mt-1 w-full" type="text" name="content" :value="old('content', $informasi->content)" required autofocus placeholder="Isi" />
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="px-4 py-2 w-full bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">Edit</button>
        </form>
    </main>
</body>

</html>
