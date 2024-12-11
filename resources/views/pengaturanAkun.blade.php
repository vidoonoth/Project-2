<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-32 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('homePage') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="">
            <p class="pengaturan border-b border-slate-950 w-fit font-semibold text-xl mt-7 ml-7">Pengaturan Akun</p>
        </div>
        <div class="username flex flex-col gap-6 bg-blue-400 mx-5 py-6 px-5 mt-6 rounded-[20px]">
            <div class="w-[300px]">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" required
                    autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('username')" />
            </div>
            <div class="namaLengkap w-[300px]">
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required
                    autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="email w-[300px]">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required
                    autocomplete="email" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            <div class="w-[300px]">
                @include('profile.partials.update-password-form')
            </div>
            <x-primary-button class="w-[150px] mt-[20px]">{{ __('Simpan') }}</x-primary-button>
        </div>
    </div>
</x-app-layout>
