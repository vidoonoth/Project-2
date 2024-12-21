<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div id="formPengusulan" class="flex w-full my-4 px-6">
        <form action="{{ route('profile.update', ['id' => Auth::id()] ) }}" method="POST" enctype="multipart/form-data" class="bg-blue-400 text-slate-950 text-3xl px-10 w-full py-10 rounded-xl flex flex-col gap-[10px]">
            @csrf
            @method('PUT')
            <div class="mb-4">                    
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-[300px]" type="text" name="username" :value="old('username', $user->username)" required autofocus placeholder="Username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
            <div class="mb-4">                    
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" class="block mt-1 w-[300px]" type="text" name="name" :value="old('name', $user->name)" required autofocus placeholder="Judul Buku" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div id="email" class="mb-4">                    
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-[300px]" type="text" name="email" :value="old('email', $user->email)" required autofocus placeholder="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>           
            <div id="nik" class="mb-4">                    
                <x-input-label for="nik" :value="__('Nik')" />
                <x-text-input id="nik" class="block mt-1 w-[300px]" type="number" name="nik" :value="old('nik', $user->nik)" required autofocus placeholder="Nik" />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>           
            <div id="numberphone" class="mb-4">                    
                <x-input-label for="numberphone" :value="__('Nomor Telepon')" />
                <x-text-input id="numberphone" class="block mt-1 w-[300px]" type="number" name="numberphone" :value="old('numberphone', $user->numberphone)" required autofocus placeholder="Judul Buku" />
                <x-input-error :messages="$errors->get('numberphone')" class="mt-2" />
            </div>           
            <div id="gender" class="mb-4">                    
                <x-input-label for="gender" :value="__('Gender')" />
                <x-text-input id="gender" class="block mt-1 w-[300px]" type="text" name="gender" :value="old('gender', $user->gender)" required autofocus placeholder="Judul Buku" />
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>           
            
            {{-- <div id="password" class="mb-4 relative w-fit">
                <x-input-label for="password" :value="__('Password')" />                
                <x-text-input id="password" class="block mt-1 w-[300px]" type="password" name="password" autocomplete="off" autofocus placeholder="Kosongkan jika tidak ingin mengubah" />
                <span id="toggle-password" class="absolute right-6 top-12 transform -translate-y-1/2 cursor-pointer">
                    <i class="fa-solid fa-eye fa-beat-fade fa-sm" style="color: #61a8f5;"></i>
                </span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
                        
            <div class="mb-4">                    
                <x-input-label for="password_confirmation" :value="__('Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-[300px] placeholder:text-slate-400" type="password" name="password_confirmation" required autofocus placeholder="Konfirmasi Password baru" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div> --}}


            <div id="profileImage" class="mb-4">                    
                <x-input-label for="profileImage" :value="__('Foto Profil')" />
                <x-file-input id="profileImage" class="block mt-1 w-[300px]" type="file" name="profileImage" accept="image/*"/>                
                <x-input-error :messages="$errors->get('profileImage')" class="mt-2" />
            </div>                       
            
            @if($user->profileImage)
                <div class="mt-2 w-full">
                    <img src="{{ asset('storage/' . $user->profileImage) }}" alt="Gambar Buku" class="object-cover rounded">
                </div>
            @endif
            

            <div class="w-full mt-10 flex ">
                <x-primary-button class="w-[200px]">
                    {{ __('Update Pengusulan') }}
                </x-primary-button>
            </div>
        </form>
    </div>


    <script>
        // document.getElementById('toggle-password').addEventListener('click', function() {
        //     // Ambil elemen input password
        //     var passwordInput = document.getElementById('password');
            
        //     // Cek tipe input, jika password, ubah jadi text, jika text, ubah jadi password
        //     if (passwordInput.type === 'password') {
        //         passwordInput.type = 'text';
        //         this.innerHTML = '<i class="fa fa-eye-slash fa-beat"></i>';  // Ganti ikon menjadi mata tertutup
        //     } else {
        //         passwordInput.type = 'password';
        //         this.innerHTML = '<i class="fa fa-eye fa-beat"></i>';  // Ganti ikon menjadi mata terbuka
        //     }
        // });
        document.getElementById('toggle-password').addEventListener('click', function() {
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.getElementById('eye-icon');
    
    // Cek tipe input, jika password, ubah jadi text, jika text, ubah jadi password
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');  // Ganti ikon menjadi mata tertutup
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');  // Ganti ikon menjadi mata terbuka
    }
});

    </script>
    
</x-app-layout>
