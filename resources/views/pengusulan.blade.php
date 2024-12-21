<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pengusulan') }}
        </h2>
    </x-slot>

    {{-- <main class="pt-2">
        @livewire('pengusulan')
        @livewireScripts
    </main> --}}



    <main class="pt-2 px-4 sm:px-6 w-full slate-50">
        <h1 class="w-fit font-semibold border-b border-slate-950 text-xl mt-2">Pengusulan</h1>
        @if ($errors->any())
        <div class="alert alert-danger text-white p-4">
            <ul>
                @foreach ($errors as $salah)
                    <li>{{ $salah }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div id="formPengusulan" class="flex justify-center w-full my-10">
            <form action="{{ route('pengusulan.store') }}" method="POST" enctype="multipart/form-data" class="bg-blue-400 text-slate-950 px-10 py-10 rounded-xl" >
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full">
                    <div class="mb-4">
                        <x-input-label class="" for="bookTitle" :value="__('Judul Buku')" />
                        <x-text-input id="bookTitle" class="block mt-1 w-full placeholder:text-slate-500" type="text" name="bookTitle"
                            :value="old('bookTitle')" required autofocus autocomplete="bookTitle" placeholder="Judul Buku" />
                        <x-input-error :messages="$errors->get('bookTitle')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label class="genre" for="genre" :value="__('Kategori')" />
                        <x-select id="genre" name="genre" class="block mt-1 w-full placeholder:text-slate-500" :options="['Self Improvement' => 'Self Improvement', 'Fiksi Sejarah' => 'Fiksi Sejarah', 'Puisi' => 'Puisi', 'Sejarah' => 'Sejarah']" required />
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label class="" for="isbn" :value="__('ISBN')" />
                        <x-text-input id="isbn" class="block mt-1 w-full placeholder:text-slate-500" type="number" name="isbn"
                            :value="old('isbn')" autofocus autocomplete="isbn" placeholder="Isbn (tidak wajib diisi)"/>
                        <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-input-label class="" for="author" :value="__('Pengarang')" />
                        <x-text-input id="author" class="block mt-1 w-full placeholder:text-slate-500" type="text" name="author"
                            :value="old('author')" required autofocus autocomplete="author" placeholder="Pengarang" />
                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label class="" for="publicationYear" :value="__('Tahun Terbit')" />
                        <x-text-input id="publicationYear" class="block mt-1 w-full placeholder:text-slate-500" type="number" name="publicationYear"
                            :value="old('publicationYear')" required autofocus autocomplete="publicationYear" placeholder="Tahun Terbit"/>
                        <x-input-error :messages="$errors->get('publicationYear')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label class="" for="publisher" :value="__('Penerbit')" />
                        <x-text-input id="publisher" class="block mt-1 w-full placeholder:text-slate-500 text-sm" type="text" name="publisher"
                            :value="old('publisher')" required autofocus autocomplete="publisher" placeholder="Penerbit"/>
                        <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
                    </div>

                   <div class="mb-4">
                        <x-input-label class="" for="date" :value="__('Tanggal')" />
                        <x-text-input id="date" class="block mt-1 w-full placeholder:text-slate-500 text-sm" type="date" name="date"
                            :value="old('date')" required autofocus autocomplete="date" placeholder="date"/>
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label class="" for="bookImage" :value="__('Gambar Buku')" />
                        <x-file-input id="bookImage" class="block mt-1 w-full placeholder:text-slate-500" type="file" name="bookImage" accept="image/*"
                            :value="old('bookImage')" autofocus autocomplete="bookImage" placeholder="bookImage"/>
                        <x-input-error :messages="$errors->get('bookImage')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full mt-10 flex items-center justify-center">
                    <x-primary-button class="ms-4 w-[200px]">
                        {{ __('Konfirmasi') }}
                    </x-primary-button>
                </div>
             </form>
        </div>
    </main>
</x-app-layout>
