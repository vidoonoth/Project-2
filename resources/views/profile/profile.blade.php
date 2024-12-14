<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-10 px-6  w-full bg-blue-500">
        <p class="text-xl font-medium w-fit border-b border-slate-100 mb-9 text-white">Profile</p>
        
        <div id="main" class="flex flex-col gap-12 w-[400px] text-white pb-14 mt-10">
            <div id="profileImage & username" class="flex gap-6 items-center">
                <div class="w-[120px] h-[120px] bg-slate-50 rounded-full">
                    <img src="" alt="foto profil">
                </div>
                <p class="font-semibold text-[20px]">{{ $user->username }}</p>
            </div>
            <div class="flex flex-col gap-2 ">
                <div id="name" class="flex gap-7 w-full justify-between">
                    <p class="text-[16px] font-semibold ">Nama Lengkap : </p>
                    <p>{{ $user->name }}</p>
                </div>
                <div id="email" class="flex gap-7 justify-between">
                    <p class="text-[16px] font-semibold">Email :</p>
                    <p>{{ $user->email }}</p>
                </div>
                <div id="nik" class="flex gap-7 justify-between">
                    <p class="text-[16px] font-semibold">NIK :</p>
                    <p>{{ $user->nik }}</p>
                </div>
                <div id="gender" class="flex gap-7 justify-between">
                    <p class="text-[16px] font-semibold">Jenis Kelamin :</p>
                    <p>{{ $user->gender }}</p>
                </div>
                <div id="password" class="flex gap-7 justify-between">
                    <p class="text-[16px] font-semibold justify-between">Password :</p>
                    <p>{{ $passwordStars }}</p>
                </div>
                <div id="password" class="flex gap-7 justify-between">
                    <p class="text-[16px] font-semibold">No. Telepon :</p>
                    <p>{{ $user->numberphone}}</p>
                </div>
            </div>
            <a class="" href="{{ route('profile.edit', ['id' => Auth::id()]) }}">
                <x-primary-button class=" rounded-[50px] w-full h-[40px] text-center items-center ">
                {{ __('edit') }}
                </x-primary-button>
            </a>
        </div>
    </div>
</x-app-layout>
