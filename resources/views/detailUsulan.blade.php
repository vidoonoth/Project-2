<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto mt-4">
        <div class="bg-white rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 border-b w-fit">Detail Usulan</h1>
            <div class="flex items-center mt-6">                
                <!-- Gambar Buku -->
                <div class="flex justify-center w-[400px] h-[400px]">
                    @if($pengusulan->bookImage)
                        <img src="{{ asset('storage/' . $pengusulan->bookImage) }}" alt="{{ $pengusulan->bookImage }}" class="rounded-lg shadow-md max-w-sm">
                    @else
                        <span class="text-gray-50 flex items-center font-semibold text-center">Tidak ada gambar</span>
                    @endif
                    
                </div>
                <!-- Informasi Buku -->
                <div class="flex flex-col gap-2">
                    
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">Judul Buku:</span> {{ $pengusulan->bookTitle }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">ISBN:</span> {{ $pengusulan->isbn }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">Kategori:</span> {{ $pengusulan->genre }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">Pengarang:</span> {{ $pengusulan->author }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">Penerbit:</span> {{ $pengusulan->publisher }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">Tahun Terbit:</span> {{ $pengusulan->publicationYear }}</p>
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">Tanggal Pengusulan:</span> {{ $pengusulan->date }} </p>
                    <p class="text-sm text-gray-600"><span class="font-semibold text-[16px]">Status:</span> {{ $pengusulan->status }}</p>
                    
                    
                </div>
            </div>
            {{-- <div class="mt-6">
                <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Kembali
                </a>
            </div> --}}
        </div>
    </div>
</body>
</html>