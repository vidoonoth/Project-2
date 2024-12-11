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
        <h1 class="text-xl font-semibold mb-6 text-gray-700">Edit Buku</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            @if($book->bookImage)
                <div class="mt-2 w-fit object-contain shadow-md">
                    <img src="{{ asset('storage/' . $book->bookImage) }}" alt="Gambar Buku" class="w-fit h-fit object-cover rounded">
                </div>
            @endif
            <div class="flex flex-col">
                {{-- <label for="bookImage" class="mb-1 text-gray-600 font-medium">Gambar Buku</label>
                <input type="file" id="bookImage" name="bookImage" accept="image/*"
                    class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"> --}}
                <x-input-label for="bookImage" :value="__('Gambar Buku')" class="text-slate-950"/>
                <x-file-input id="bookImage" class="block mt-1 w-full" type="file" name="bookImage" accept="image/*" />
                <x-input-error :messages="$errors->get('bookImage')" class="mt-2" />
            </div>

            <div class="flex flex-col">
                <x-input-label for="isbn" :value="__('ISBN')" class="text-slate-950"/>
                <x-text-input id="isbn" class="block mt-1 w-full" type="number" name="isbn" :value="old('isbn', $book->isbn)" placeholder="ISBN" />
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>

            <div class="flex flex-col">
                <x-input-label for="bookTitle" :value="__('Judul Buku')" class="text-slate-950"/>
                <x-text-input id="bookTitle" class="block mt-1 w-full" type="text" name="bookTitle" :value="old('bookTitle', $book->bookTitle)" required autofocus placeholder="Judul Buku" />
                <x-input-error :messages="$errors->get('bookTitle')" class="mt-2" />
            </div>

            <div class="flex flex-col">
                <x-input-label for="author" :value="__('Pengarang')" class="text-slate-950"/>
                        <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author', $book->author)" required placeholder="Pengarang" />
                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
            </div>

            <div class="flex flex-col">
                <x-input-label for="genre" :value="__('Kategori')" class="text-slate-950" />
                <x-select id="genre" name="genre" class="block mt-1 w-full" :options="['Fiksi' => 'Fiksi', 'Fiksi Sejarah' => 'Fiksi Sejarah', 'Self Improvement' => 'Self Improvement', 'Puisi' => 'Puisi', 'Komedi' => 'Komedi',  'Aksi' => 'Aksi', 'Sejarah' => 'Sejarah']" :selected="old('genre', $book->genre)"/>
                <x-input-error :messages="$errors->get('genre')" class="mt-2" />
            </div>
            <div class="flex flex-col">
                <x-input-label for="publicationYear" :value="__('Tahun Terbit')" class="text-slate-950" />
                <x-text-input id="publicationYear" class="block mt-1 w-full" type="number" name="publicationYear" :value="old('publicationYear', $book->publicationYear)" required placeholder="Tahun Terbit" />
                <x-input-error :messages="$errors->get('publicationYear')" class="mt-2" />
            </div>
            <div class="flex flex-col">
                <x-input-label for="publisher" :value="__('Penerbit')" class="text-slate-950" />
                <x-text-input id="publisher" class="block mt-1 w-full" type="text" name="publisher" :value="old('publisher', $book->publisher)" required placeholder="Penerbit" />
                <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
            </div>
            <div class="flex flex-col">
                <x-input-label for="description" :value="__('Deskripsi')" class="text-slate-950"/>
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $book->description)" required placeholder="Deskripisi" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="flex flex-col">
                <x-input-label for="synopsis" :value="__('Sinopsis')" class="text-slate-950" />
                <x-text-input id="synopsis" class="block mt-1 w-full" type="text" name="synopsis" :value="old('synopsis', $book->synopsis)" required placeholder="Penerbit" />
                <x-input-error :messages="$errors->get('synopsis')" class="mt-2" />
            </div>
                <button type="submit" class="px-4 py-2 w-full bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition">Edit</button>
        </form>
    </main>
</body>

</html>
