<x-guest-layout>
    {{-- <div class="fixed w-full">
        <div class="w-full text-black bg-slate-600 hidden md:hidden xl:hidden lg:block">ini lg</div>
        <div class="w-full text-black bg-slate-600 hidden md:hidden xl:block lg:hidden">ini xl</div>
        <div class="w-full text-black bg-slate-600 hidden md:block xl:hidden lg:hidden">ini md</div>
        <div class="w-full text-black bg-slate-600 block md:hidden xl:hidden lg:hidden">ini sm</div>
    </div> --}}

    <div class="bg-blue-400 h-full w-full flex flex-col items-center pb-10 ">
        <p class="pt-[10px] text-slate-50 text-[50px] font-semibold text-center">Registrasi</p>
        <form class="mt-10 gap-4 md:gap-4 lg-gap-4 xl:gap-4 flex flex-col justify-center place-content-center items-center justify-items-center w-4/6 md:w-4/6 xl:w-4/6 lg:w-4/6" method="POST" action="{{ route('register') }}">
            @csrf

            {{-- username & nama lengkap --}}
            <div id="username&namalengkap" class="flex flex-col md:flex-row lg:flex-row xl:flex-row gap-4 md:gap-24 lg:gap-24 xl:gap-24 justify-center items-center">
                <!-- username -->
                <div>
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-[250px]" type="text" name="username" :value="old('username')" placeholder="Username"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mb-2" />
                </div>

                <!-- Nama lengkap -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" class="block mt-1 w-[250px]" type="text" name="name" placeholder="Nama Lengkap"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
            </div>

            {{-- email &no telpon --}}
            <div id="email&no telpon" class="flex flex-col md:flex-row lg:flex-row xl:flex-row gap-4 md:gap-24 lg:gap-24 xl:gap-24 justify-center items-center">
                <!-- Email Address -->
                <div class="">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-[250px]" type="email" name="email" placeholder="Email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- no telepon -->
                <div class="">
                    <x-input-label for="numberphone" :value="__('Nomor Telepon')" />
                    <x-text-input id="numberphone" class="block mt-1 w-[250px]" type="number" name="numberphone" placeholder="08XXXXXXX"
                        :value="old('numberphone')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('numberphone')" class="mt-2" />
                </div>
            </div>

            <!-- nik & gender -->
            <div id="nik&gender" class="flex flex-col md:flex-row lg:flex-row xl:flex-row gap-4 md:gap-24 lg:gap-24 xl:gap-24 justify-center items-center">
                {{-- nik --}}
                <div class="">
                    <x-input-label for="nik" :value="__('NIK')" />
                    <x-text-input id="nik" class="block mt-1 w-[250px]" type="number" name="nik" placeholder="NIK"
                        :value="old('nik')" required autocomplete="nik" />
                    <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                </div>
                <!-- gender -->
                <div class="">
                    <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                    <x-select id="gender" name="gender" class="block mt-1 w-[250px]" :options="['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan']" required />
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
            </div>

            <!-- Password & confirm password -->
            <div id="password&confirm password" class="flex flex-col md:flex-row lg:flex-row xl:flex-row gap-4 md:gap-24 lg:gap-24 xl:gap-24 justify-center items-center">
                {{-- password --}}
                <div class="">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-[250px]" type="password" name="password" required placeholder="Password"
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-[250px]" type="password" placeholder="Konfirmasi Password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            {{-- button --}}
            <div class="flex flex-col gap-3 items-center justify-center mt-[45px]">
                <x-primary-button class="w-[150px]">
                    {{ __('daftar') }}
                </x-primary-button>
                <a class="no-underline text-sm text-slate-50 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100"
                    href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
