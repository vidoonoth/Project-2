<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Pengusulan') }}
        </h2>
    </x-slot>

    <main class="pt-2 px-4 sm:px-6 w-full slate-50">
        <h1 class="w-fit font-semibold border-b border-slate-950 text-xl mt-2">Edit Pengusulan</h1>

        @if ($errors->any())
            <div class="alert alert-danger text-white p-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div id="formPengusulan" class="flex w-[90%] my-4">
            <form action="{{ route('pengusulan.update', $pengusulan->id) }}" method="POST" enctype="multipart/form-data" class="bg-blue-400 text-slate-950 text-3xl px-10 w-full py-10 rounded-xl flex flex-col gap-[10px]">
                @csrf
                @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="bookTitle" :value="__('Judul Buku')" />
                        <x-text-input id="bookTitle" class="block mt-1 w-[300px]" type="text" name="bookTitle" :value="old('bookTitle', $pengusulan->bookTitle)" required autofocus placeholder="Judul Buku" />
                        <x-input-error :messages="$errors->get('bookTitle')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="genre" :value="__('Kategori')" />
                        {{-- <x-select id="genre" name="genre" class="block mt-1 w-[300px]" :options="['fiksi' => 'fiksi', 'action' => 'action']" :selected="old('genre', $pengusulan->genre)" required /> --}}
                        <x-select id="genre" name="genre" class="block mt-1 w-[300px]" :options="['Fiksi' => 'Fiksi', 'Fiksi Sejarah' => 'Fiksi Sejarah', 'Self Improvement' => 'Self Improvement', 'Puisi' => 'Puisi', 'Komedi' => 'Komedi',  'Aksi' => 'Aksi', 'Sejarah' => 'Sejarah']" :selected="old('genre', $pengusulan->genre)"/>
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="isbn" :value="__('ISBN')" />
                        <x-text-input id="isbn" class="block mt-1 w-[300px]" type="number" name="isbn" :value="old('isbn', $pengusulan->isbn)" placeholder="ISBN" />
                        <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="author" :value="__('Pengarang')" />
                        <x-text-input id="author" class="block mt-1 w-[300px]" type="text" name="author" :value="old('author', $pengusulan->author)" required placeholder="Pengarang" />
                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="publicationYear" :value="__('Tahun Terbit')" />
                        <x-text-input id="publicationYear" class="block mt-1 w-[300px]" type="number" name="publicationYear" :value="old('publicationYear', $pengusulan->publicationYear)" required placeholder="Tahun Terbit" />
                        <x-input-error :messages="$errors->get('publicationYear')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="publisher" :value="__('Penerbit')" />
                        <x-text-input id="publisher" class="block mt-1 w-[300px]" type="text" name="publisher" :value="old('publisher', $pengusulan->publisher)" required placeholder="Penerbit" />
                        <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="date" :value="__('Tanggal')" />
                        <x-text-input id="date" class="block mt-1 w-[300px]" type="date" name="date" :value="old('date', $pengusulan->date)" required />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="bookImage" :value="__('Gambar Buku')" />
                        <x-file-input id="bookImage" class="block mt-1 w-[300px]" type="file" name="bookImage" accept="image/*" />
                        <x-input-error :messages="$errors->get('bookImage')" class="mt-2" />
                    </div>
                    @if($pengusulan->bookImage)
                            <div class="mt-2 w-full">
                                <img src="{{ asset('storage/' . $pengusulan->bookImage) }}" alt="Gambar Buku" class="w-[500px] h-[200px] object-cover rounded">
                            </div>
                    @endif


                <div class="w-full mt-10 flex ">
                    <x-primary-button class="w-[200px]">
                        {{ __('Update Pengusulan') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
