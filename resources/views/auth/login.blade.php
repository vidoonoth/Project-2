<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- <div class="fixed">
        <div class="w-full text-black bg-slate-600 hidden md:hidden xl:hidden lg:block">ini lg</div>
        <div class="w-full text-black bg-slate-600 hidden md:hidden xl:block lg:hidden">ini xl</div>
        <div class="w-full text-black bg-slate-600 hidden md:block xl:hidden lg:hidden">ini md</div>
        <div class="w-full text-black bg-slate-600 block md:hidden xl:hidden lg:hidden">ini sm</div>
    </div> --}}

    <div class="flex bg-slate-50 dark:bg-gray-900">

        {{-- logo --}}
        <div id="logo" class="hidden text-black md:flex lg:flex xl:flex w-2/5 justify-center items-center">
            <x-logo-login class=" hover:text-gray-800 transition-all ease-linear duration-300 dark:text-gray-200" />
        </div>

        {{-- form login --}}
        <div id="form login" class="w-full md:w-3/5 lg:w-3/5 xl:w-3/5 h-screen bg-blue-400 flex justify-center justify-items-center">
            <div class="form flex-flex-col">
                <h1 class="text-slate-50 font-bold text-5xl text-center mt-[35px]">Login</h1>
                <form class="w-72 flex flex-col  align-content-center align-items-center justify-items-center" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div class="mt-[70px] flex flex-col align-content-center items-start justify-center">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full placeholder:text-slate-400 W-96" placeholder="email" type="email"
                            name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 flex flex-col align-content-center items-start justify-center">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full placeholder:text-slate-400" type="password" name="password"
                            placeholder="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    {{-- <div class="flex mt-4 text-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                name="remember">
                            <span class="ms-2 text-sm text-slate-50 dark:text-gray-400">{{ __('Ingat saya') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="no-underline text-sm text-slate-50 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md"
                                href="{{ route('password.request') }}">
                                {{ __('Lupa kata sandi?') }}
                            </a>
                        @endif
                    </div> --}}

                    <div class="mt-11 flex flex-col justify-items-center place-items-center align-content-center justify-center">
                        <x-primary-button class="text-center items-center justify-center w-full">
                            {{ __('login') }}
                        </x-primary-button>
                        <a wire:navigate href="{{ route('register') }}"
                            class="text-sm rounded-md px-3 py-2 text-slate-50 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Belum punya akun?
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-guest-layout>
