<div class="card flex flex-col bg-slate-100 shadow shadow-slate-300 w-[280px] h-fit {{-- h-[638px] --}} rounded-[20px] items-center py-5 px-5 text-left">
        <img class="card-img-top w-[170px] rounded-[10px]" src="{{ asset('storage/' . $bookImage) }}" alt="Book Image">

    <div class="card-body">
        <div class=" text-center flex flex-col items-center gap-2 my-5">
            <p class="card-title font-semibold">{{ $bookTitle }}</p>
            <p class="card-text w-fit bg-slate-300 py-1 px-2 rounded-md">{{ $genre }}</p>
        </div>
        <details class="cursor-pointer">
            <summary class="cursor-pointer">Detail</summary>
            <p class="card-text"><span class="font-semibold">ISBN:</span> {{ $isbn }}</p>
            <p class="card-text"><span class="font-semibold">Penulis: </span> {{ $author }}</p>
            <p class="card-text"><span class="font-semibold">Tahun Terbit: </span> {{ $yearPublication }}</p>
            <p class="card-text"><span class="font-semibold">Penerbit: </span>{{ $publisher }}</p>
            <p class="card-text"><span class="font-semibold">Deskripsi:</span> {{ $description }}</p>
            <p class="card-text"><span class="font-semibold">Sinopsis:</span> {{ $synopsis }}</p>
        </details>

        {{-- <a href="#" class="btn btn-primary">Baca Selengkapnya</a> --}}
    </div>
</div>
