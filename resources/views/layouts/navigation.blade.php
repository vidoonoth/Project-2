@if (Route::has('login'))
@if (Route::has('register'))

@auth
<nav x-data="{ open: false }" class="sticky z-20 px-4 w-full bg-blue-400 py-3 dark:bg-gray-800" style="transition: top 0.5s;">

    <!-- Primary Navigation Menu -->
        <div class="flex items-center justify-between h-auto gap-28">

            <!-- Logo -->
            <div id="logo" class="hover:text-gray-800">
                <a href="{{ route('homePage') }}">
                    <x-application-logo class="h-9 dark:text-gray-200" />
                </a>
            </div>

            {{-- fitur utama --}}
            <div id="fitur utama" class="items-center hidden md:flex xl:flex lg:flex w-auto gap-9 text-slate-50 text-base">
                <a id="pengusulan" class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium hover:text-slate-700 transition-all ease-linear duration-300" href="{{ route('pengusulan.create') }}">Pengusulan</a>
                <a id="riwayat pengusulan" class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium hover:text-slate-700 transition-all ease-linear duration-300 "  href="{{ route('pengusulan.index') }}">Riwayat Pengusulan</a>
                <x-dropdown class="hover:text-slate-700" align="left" width="48">
                    <x-slot name="trigger">
                        <div class="cursor-pointer inline-flex items-center text-sm leading-4 font-medium dark:text-gray-400 dark:bg-gray-800 hover:text-slate-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <h1 class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium transition-all ease-linear duration-300">Info</h1>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('sejarah')">
                            {{ __('Sejarah') }}
                        </x-dropdown-link>
                        <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('visiMisi')">
                            {{ __('Visi Misi') }}
                        </x-dropdown-link>
                        <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('denahPeta')">
                            {{ __('Denah & Peta') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                    </x-slot>
                </x-dropdown>
                <a id="koleksiBuku" class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium hover:text-slate-700 transition-all ease-linear duration-300" href="{{ route('koleksiBuku') }}">Koleksi Buku</a>
            </div>

            {{-- profile --}}
            <div class="flex gap-[5px] items-center">
                <a href="{{ route('notifikasiUser') }}">
                    <svg id="notifikasi" xmlns="http://www.w3.org/2000/svg" class="hover:text-black" width="30" height="30" viewBox="0 0 512 512"><path fill="#fff" d="M440.08 341.31c-1.66-2-3.29-4-4.89-5.93c-22-26.61-35.31-42.67-35.31-118c0-39-9.33-71-27.72-95c-13.56-17.73-31.89-31.18-56.05-41.12a3 3 0 0 1-.82-.67C306.6 51.49 282.82 32 256 32s-50.59 19.49-59.28 48.56a3.1 3.1 0 0 1-.81.65c-56.38 23.21-83.78 67.74-83.78 136.14c0 75.36-13.29 91.42-35.31 118c-1.6 1.93-3.23 3.89-4.89 5.93a35.16 35.16 0 0 0-4.65 37.62c6.17 13 19.32 21.07 34.33 21.07H410.5c14.94 0 28-8.06 34.19-21a35.17 35.17 0 0 0-4.61-37.66M256 480a80.06 80.06 0 0 0 70.44-42.13a4 4 0 0 0-3.54-5.87H189.12a4 4 0 0 0-3.55 5.87A80.06 80.06 0 0 0 256 480"/></svg>
                </a>
                <div class="profil hidden md:flex lg:flex xl:flex">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-slate-50 dark:text-slate-50 dark:bg-gray-800 hover:text-slate-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-3000">
                                <div>{{ Auth::user()->username }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('profile.index')">
                                {{ __('Profil') }}
                            </x-dropdown-link>
                            {{-- <x-dropdown-link :href="route('pengaturanAkun')">
                                {{ __('Profil') }}
                            </x-dropdown-link> --}}

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" class="text-slate-900">
                                @csrf

                                <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Keluar') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

                <!-- Hamburger -->
            <div id="hamburger" class="flex items-center md:hidden lg:hidden xl:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 text-slate-50 hover:bg-slate-50 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-5 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('pengusulan.create')" :active="request()->routeIs('homePage')">
                {{ __('Pengusulan') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('pengusulan.index')" :active="request()->routeIs('homePage')">
                {{ __('Riwayat Pengusulan') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('sejarah')" :active="request()->routeIs('homePage')">
                {{ __('Sejarah') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('visiMisi')" :active="request()->routeIs('homePage')">
                {{ __('Visi Misi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('denahPeta')" :active="request()->routeIs('homePage')">
                {{ __('Denah & Peta') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('koleksiBuku')" :active="request()->routeIs('homePage')">
                {{ __('koleksiBuku') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t-2 border-slate-50 dark:border-slate-100">
            {{-- <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div> --}}

            <div class="mt-2 space-y-1">
                <x-responsive-nav-link :href="route('profile.index')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

@else

<nav x-data="{ open: false }" class="sticky z-20 px-4 w-full bg-blue-400 py-3 dark:bg-gray-800" style="transition: top 0.5s;">

    <!-- Primary Navigation Menu -->
        <div class="flex items-center justify-between h-auto gap-28">

            <!-- Logo -->
            <div id="logo" class="hover:text-gray-800">
                <a href="{{ route('homePage') }}">
                    <x-application-logo class="h-9 dark:text-gray-200" />
                </a>
            </div>

            {{-- fitur utama --}}
            <div id="fitur utama" class="items-center hidden md:flex xl:flex lg:flex w-auto gap-9 text-slate-50 text-base">
                <a class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium hover:text-slate-700 transition-all ease-linear duration-300" href="{{ route('login') }}">Pengusulan</a>
                <a class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium hover:text-slate-700 transition-all ease-linear duration-300 "  href="{{ route('login') }}">Riwayat Pengusulan</a>
                <x-dropdown class="hover:text-slate-700" align="left" width="48">
                    <x-slot name="trigger">
                        <div class="cursor-pointer inline-flex items-center text-sm leading-4 font-medium dark:text-gray-400 dark:bg-gray-800 hover:text-slate-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <h1 class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium transition-all ease-linear duration-300">Info</h1>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('login')">
                            {{ __('Sejarah') }}
                        </x-dropdown-link>
                        <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('login')">
                            {{ __('Visi Misi') }}
                        </x-dropdown-link>
                        <x-dropdown-link class="text-slate-950 hover:bg-slate-200" :href="route('login')">
                            {{ __('Denah & Peta') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                    </x-slot>
                </x-dropdown>
                <a class="md:text-sm font-normal md:font-normal lg:font-medium xl:font-medium hover:text-slate-700 transition-all ease-linear duration-300" href="{{ route('login') }}">Koleksi Buku</a>
            </div>

            <div id="login & register" class="hidden md:flex lg:flex xl:flex justify-center items-center text-slate-50">
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Login
                </a>
                <p>|</p>
                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Daftar
                </a>

            </div>

                <!-- Hamburger -->
            <div id="hamburger" class="flex items-center md:hidden lg:hidden xl:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 text-slate-50 hover:bg-slate-50 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-5 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('homePage')">
                {{ __('Pengusulan') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('homePage')">
                {{ __('Riwayat Pengusulan') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('homePage')">
                {{ __('Sejarah') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('homePage')">
                {{ __('Visi Misi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('homePage')">
                {{ __('Denah & Peta') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('homePage')">
                {{ __('koleksiBuku') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            {{-- <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div> --}}

            <div class="mt-2 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>


            </div>
        </div>
    </div>
</nav>

{{-- <nav x-data="{ open: false }" class="bg-blue-400 dark:bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full mx-auto px-2 sm:px-2 lg:px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center hover:text-gray-800">
                    <a href="{{ route('homePage') }}">
                        <x-application-logo class="block h-9 w-auto fill-current dark:text-gray-200" />
                    </a>
                </div>

            </div>

            <div class="hidden md:flex lg:flex xl:flex w-auto justify-center items-center gap-12 text-slate-50 text-base">
                <a class="font-medium hover:text-slate-700 transition-all ease-linear duration-300" href="{{ route('login') }}">Pengusulan</a>
                <a class="font-medium hover:text-slate-700 transition-all ease-linear duration-300 "  href="{{ route('login') }}">Riwayat Pengusulan</a>
                <x-dropdown class="hover:text-slate-700" align="left" width="48">
                    <x-slot name="trigger">
                        <div class="cursor-pointer inline-flex items-center text-sm leading-4 font-medium dark:text-gray-400 dark:bg-gray-800 hover:text-slate-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <h1 class="font-medium transition-all ease-linear duration-300">Info</h1>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('sejarah')">
                            {{ __('Sejarah') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('visiMisi')">
                            {{ __('Visi Misi') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('denahPeta')">
                            {{ __('Denah & Peta') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                    </x-slot>
                </x-dropdown>
                <a class="font-medium hover:text-slate-700 transition-all ease-linear duration-300" href="{{ route('koleksiBuku') }}">Koleksi Buku</a>
            </div>


            <!-- Settings Dropdown -->

            <div id="login & register" class="flex justify-center items-center text-slate-50">
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Login
                </a>
                <p>|</p>
                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Daftar
                </a>

            </div>
        </div>
    </div>
</nav> --}}
@endauth
@endif
@endif
