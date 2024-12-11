<main class="pt-2 pl-6 pr-6 w-full slate-50">
    <h1 class="w-fit font-semibold border-b border-slate-950 text-xl mt-2">Pengusulan</h1>
    <div class="flex justify-center w-full mt-4">
        <form class="rounded-xl flex flex-wrap w-1/2 bg-blue-400 justify-between items-center pt-7 pb-8 pl-12 pr-12" action="POST" enctype="multipart/form-data">
            <!-- judul buku -->
            <div class="mb-4">
                <x-input-label class="" for="bookTitle" :value="__('Judul Buku')" />
                <x-text-input id="bookTitle" class="block mt-1 w-60" type="text" name="bookTitle"
                    :value="old('bookTitle')" required autofocus autocomplete="bookTitle" placeholder="Judul Buku" />
                <x-input-error :messages="$errors->get('bookTitle')" class="mt-2" />
            </div>
            <!-- Kategori -->
            <div class="mb-4">
                <x-input-label class="genre" for="genre" :value="__('Kategori')" />
                <x-select id="genre" name="genre" class="block mt-1 w-60" :options="['fiksi' => 'fiksi', 'action' => 'action']" required />
                <x-input-error :messages="$errors->get('genre')" class="mt-2" />
            </div>
            <!-- Isbn -->
            <div class="mb-4">
                <x-input-label class="" for="isbn" :value="__('ISBN')" />
                <x-text-input id="isbn" class="block mt-1 w-60" type="text" name="isbn"
                    :value="old('isbn')" required autofocus autocomplete="isbn" placeholder="Isbn"/>
                <x-input-error :messages="$errors->get('isbn')" class="mt-2" />
            </div>
            <!-- Pengarang -->
            <div class="mb-4">
                <x-input-label class="" for="author" :value="__('Pengarang')" />
                <x-text-input id="author" class="block mt-1 w-60" type="text" name="author"
                    :value="old('author')" required autofocus autocomplete="author" placeholder="Pengarang" />
                <x-input-error :messages="$errors->get('author')" class="mt-2" />
            </div>
            <!-- Tahun Terbit -->
            <div class="mb-4">
                <x-input-label class="" for="yearPublication" :value="__('Tahun Terbit')" />
                <x-text-input id="yearPublication" class="block mt-1 w-60" type="text" name="yearPublication"
                    :value="old('yearPublication')" required autofocus autocomplete="yearPublication" placeholder="Tahun Terbit"/>
                <x-input-error :messages="$errors->get('yearPublication')" class="mt-2" />
            </div>
            <!-- Penerbit -->
            <div class="mb-4">
                <x-input-label class="" for="publisher" :value="__('Penerbit')" />
                <x-text-input id="publisher" class="block mt-1 w-60 text-sm" type="text" name="publisher"
                    :value="old('publisher')" required autofocus autocomplete="publisher" placeholder="Penerbit"/>
                <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
            </div>
            <!-- Tanggal -->
            <div class="mb-4">
                <x-input-label class="" for="date" :value="__('Tanggal')" />
                <x-text-input id="date" class="block mt-1 w-60 text-sm" type="date" name="date"
                    :value="old('date')" required autofocus autocomplete="date" placeholder="date"/>
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <!-- Foto Buku -->
            <div class="mb-4">
                <x-input-label class="" for="bookImage" :value="__('Gambar Buku')" />
                <x-file-input id="bookImage" class="block mt-1 w-60" type="file" name="bookImage" accept="image/*"
                    :value="old('bookImage')" required autofocus autocomplete="bookImage" placeholder="bookImage"/>
                <x-input-error :messages="$errors->get('bookImage')" class="mt-2" />
            </div>
            <div class="w-full mt-10 flex items-center justify-center">
                <x-primary-button class="ms-4">
                    {{ __('Konfirmasi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</main>
