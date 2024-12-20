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
                    @if ($user->profileImage)
                        <img src="{{ asset('storage/'.$user->profileImage) }}" alt="foto profil" class="h-full w-full rounded-full object-cover">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="px-2 py-2 h-fit w-fit text-slate-700" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 1.2c-3.2 0-9.6 1.7-9.6 4.8v1.2c0 .6.6 1.2 1.2 1.2h16.8c.6 0 1.2-.6 1.2-1.2V18c0-3.1-6.4-4.8-9.6-4.8z"/>
                        </svg>
                    @endif
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

            <div id="button" class=" flex flex-col gap-3 items-center w-full">
                <a class="" href="{{ route('profile.edit', ['id' => Auth::id()]) }}">
                    <x-primary-button class="font-medium rounded-[50px] w-[400px] h-[40px] text-center items-center ">
                    {{ __('edit') }}
                    </x-primary-button>
                </a>    

                <p class="font-medium">ATAU</p>

                <div class="w-full rounded-[50px] flex items-center">                    
                    <button class="bg-red-600 font-medium w-full rounded-[50px] h-[40px] text-center items-center hover:bg-red-700" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                        Hapus Akun
                    </button>

                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" x-data="{ isModalOpen: {{ $errors->userDeletion->isNotEmpty() ? 'true' : 'false' }} }" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')
                    
                            <h2 class="text-lg font-medium text-slate-950">
                                {{ __('Apakah kamu yakin ingin menghapus akun anda?') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-slate-950 dark:text-gray-400">
                                {{ __('Jika kamu menghapus akun, semua datanya akan hilang semua') }}
                            </p>
                    
                            <div class="mt-6">
                                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block text-black w-3/4 placeholder:text-black"
                                    placeholder="{{ __('Password') }}"
                                />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>
                    
                            <div id="button" class="mt-6 flex gap-2">
                                <!-- Tombol Batal -->
                                <button type="button" 
                                    class="rounded-[50px] text-blue-400 hover:bg-blue-500 hover:text-slate-100 px-4 py-2 font-semibold"
                                    x-on:click="$dispatch('close'); isModalOpen = false; $nextTick(() => { document.querySelector('#password').value = '' })">
                                    Batal
                                </button>
                                <!-- Tombol Hapus -->
                                <button type="submit" 
                                    class="rounded-[50px] text-slate-50 bg-red-600 hover:bg-red-700 hover:text-slate-100 px-4 py-2 font-semibold">
                                    Hapus Akun
                                </button>
                            </div>
                        </form>
                    </x-modal>
                    
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
