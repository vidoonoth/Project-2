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
        <form action="{{ route('notifikasi.update', $notifikasi->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Judul Field -->
            <div class="flex flex-col">
                <label for="title" class="mb-1 text-gray-600 font-medium">Judul</label>
                <input type="text" id="title" name="title" required value="{{ old('title', $notifikasi->title) }}"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Pesan Field -->
            <div class="flex flex-col">
                <label for="message" class="mb-1 text-gray-600 font-medium">Pesan</label>
                <input type="text" id="message" name="message" required value="{{ old('message', $notifikasi->message) }}"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="px-4 py-2 w-full bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">Edit</button>
        </form>
    </main>
</body>

</html>
