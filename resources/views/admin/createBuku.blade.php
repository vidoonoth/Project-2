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
        <h1 class="text-xl font-semibold mb-6 text-gray-700">Tambah Buku</h1>
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="bookImage" class="mb-1 text-gray-600 font-medium">Gambar Buku</label>
                <input type="file" id="bookImage" name="bookImage" accept="image/*"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col">
                <label for="isbn" class="mb-1 text-gray-600 font-medium">ISBN</label>
                <input type="number" id="isbn" name="isbn"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col">
                <label for="bookTitle" class="mb-1 text-gray-600 font-medium">Judul Buku</label>
                <input type="text" id="bookTitle" name="bookTitle" required
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col">
                <label for="author" class="mb-1 text-gray-600 font-medium">Pengarang</label>
                <input type="text" id="author" name="author" required
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col">
                <label for="genre" class="mb-1 text-gray-600 font-medium">Kategori</label>
                <input type="text" id="genre" name="genre" required
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="publicationYear" class="mb-1 text-gray-600 font-medium">Tahun Terbit</label>
                <input type="number" id="pulicationYear" name="publicationYear" required
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="publisher" class="mb-1 text-gray-600 font-medium">Penerbit</label>
                <input type="text" id="publisher" name="publisher" required
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="description" class="mb-1 text-gray-600 font-medium">Deskripsi</label>
                <input type="text" id="description" name="description" required
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex flex-col">
                <label for="synopsis" class="mb-1 text-gray-600 font-medium">Sinopsis</label>
                <input type="text" id="synopsis" name="synopsis" required
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

                <button type="submit" class="px-4 py-2 w-full bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">Tambah</button>
        </form>
    </main>
</body>

</html>
