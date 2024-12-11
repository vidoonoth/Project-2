<!-- resources/views/dashboard.blade.php -->
<x-app-admin-layout class="h-screen">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 h-full">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="content" class="flex h-full min-h-full max-h-full">
        @include('layouts.sidebarAdmin')
        <div class="px-[40px] pt-5">
            <p class="text-xl font-semibold mt-[20px]">Dashboard</p>
            <div id="card" class="flex justify-center items-center w-[1000px] h-[350px] mt-[20px] gap-[20px]">
                <div class="bg-blue-500 w-[200px] h-[150px] px-[20px] py-[20px] text-slate-50 flex flex-col gap-[25px] rounded-lg even:bg-blue-600">
                    <p class="text-inherit text-[20px] font-semibold">Pengusul</p>
                    <div>
                        <p class="text-[16px]">{{ $userCount }}</p>
                    </div>
                </div>
                <div class="bg-blue-500 w-[200px] h-[150px] px-[20px] py-[20px] text-slate-50 flex flex-col gap-[25px] rounded-lg even:bg-blue-600">
                    <p class="text-inherit text-[20px] font-semibold">Buku</p>
                    <div>
                        <p class="text-[16px]">{{ $booksCount }}</p>
                    </div>
                </div>
                <div class="bg-blue-500 w-[200px] h-[150px] px-[20px] py-[20px] text-slate-50 flex flex-col gap-[25px] rounded-lg even:bg-blue-600">
                    <p class="text-inherit text-[20px] font-semibold">Pengusulan</p>
                    <div>
                        <p class="text-[16px]">{{ $pengusulanCount }}</p>
                    </div>
                </div>
            </div>

        </div>



    </div>
</x-app-admin-layout>
