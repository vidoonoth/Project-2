<x-guest-layout>
    <div class="pl-[30px] pt-[30px] bg-blue-400 h-screen w-screen">
        <div class="flex flex-col gap-[25px]">
            <a class="flex gap-[3px] items-center justify-center w-fit group" href="login">
                <svg class="group-hover:text-slate-900 group-hover:bg-slate-700 group-hover:rounded-[50px]" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 12 24"><path fill="white" fill-rule="evenodd" d="M10 19.438L8.955 20.5l-7.666-7.79a1.02 1.02 0 0 1 0-1.42L8.955 3.5L10 4.563L2.682 12z"/></svg>
                <p class="text-slate-50 group-hover:text-slate-900">Kembali</p>
            </a>
            <p class="text-slate-50 border-slate-50 border-b w-fit font-semibold text-xl">Lupa kata sandi</p>
            <p class="text-slate-50 mb-[40px]"> Lupa kata sandi? Tidak masalah. Cukup beritahu kami alamat email Anda, <br> dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi <br> yang akan memungkinkan Anda memilih yang baru.</p>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="w-52">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-[300px]" type="email" name="email" :value="old('email')" placeholder="Email@gmail.com"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 " />
            </div>

            <div class="flex items-center justify-start text-xs mt-4 w-[350px]">
                <x-primary-button class="px-[8px]">
                    {{ __('Password Reset') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
