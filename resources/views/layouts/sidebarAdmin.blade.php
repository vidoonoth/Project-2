<nav id="sidebar" class="hidden md:flex lg:flex xl:flex bg-white h-full min-h-full max-h-full w-[200px] px-3 py-5 text-slate-950 font-medium shadow-lg shadow-slate-200 flex-col gap-[20px]">
            <a href="{{ route('dashboard') }}" class="px-2 py-2 hover:bg-slate-300 rounded-md">Dashboard</a>
            <a href="{{ route('dataPengusulan') }}" class="px-2 py-2 hover:bg-slate-300 transition-all ease-in-out duration-300 rounded-md">Data Pengusulan</a>
            <a href="{{ route('books.index') }}" class="px-2 py-2 hover:bg-slate-300 transition-all ease-in-out duration-300 rounded-md">Data Koleksi Buku</a>
            <a href="{{ route('informasi.index') }}" class="px-2 py-2 hover:bg-slate-300 transition-all ease-in-out duration-300 rounded-md">Data Informasi <br> Perpustakaan</a>
            {{-- <a href="{{ route(notifikasi.index) }}" class="px-2 py-2 hover:bg-slate-300 transition-all ease-in-out duration-300 rounded-md">Notifikasi Pengusulan</a> --}}
            <a href="{{ route('notifikasi.index') }}" class="px-2 py-2 hover:bg-slate-300 transition-all ease-in-out duration-300 rounded-md">Notifikasi Pengusulan</a>
</nav>
