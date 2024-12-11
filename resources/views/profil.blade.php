<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('HomePage') }}
        </h2>
    </x-slot>

    <main class="bg-blue-500 text-slate-50 pl-[30px] pt-[50px] pb-[50px]">
        <p class="text-lg font-bold mb-[20px]">Profil</p>
        <div class="flex flex-col gap-[50px]">
        <div class="flex gap-[20px] items-center">
            <div class="rounded-full bg-blue-400 w-[80px] h-[80px]">
                <img class="rounded-full " src="{{ asset('images/a.jpg') }}" alt="Profile">
            </div>
            <p class="text-xl font-semibold mt-4">Ms. Jean</p>
        </div>

        <div id="info-group" class=" text-sm flex flex-col gap-[15px]">
            <p><span class="font-bold">Nama Lengkap:</span> Jean Nova</p>
            <p><span class="font-bold">Email:</span> Jean123@gmail.com</p>
            <p><span class="font-bold">NIK:</span> 232530429042</p>
            <p><span class="font-bold">Jenis Kelamin:</span> Perempuan</p>
        </div>

        <button class="bg-slate-50 w-[170px] h-[35px] text-blue-500 font-semibold rounded-full shadow hover:bg-blue-100">
            Edit Profil
        </button>
        </div>
    </main>
</x-app-layout>
