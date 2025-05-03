<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Profile Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">
                    Profil
                </h1>                
            </div>

            <!-- Profile Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
                <!-- Profile Image & Basic Info -->
                <div class="p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6 border-b border-gray-100 dark:border-gray-700">
                    <div class="relative">
                        <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full bg-gray-100 dark:bg-gray-700 overflow-hidden flex items-center justify-center">
                            @if ($user->profileImage)
                                <img src="{{ asset('storage/'.$user->profileImage) }}" alt="Profile photo" class="h-full w-full object-cover">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            @endif
                        </div>
                    </div>
                    
                    <div class="text-center sm:text-left">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                        {{-- <p class="text-gray-600 dark:text-gray-300">{{ $user->username }}</p> --}}
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $user->email }}</p>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Full Name</p>
                                <p class="mt-1 text-gray-900 dark:text-white">{{ $user->name }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Gender</p>
                                <p class="mt-1 text-gray-900 dark:text-white">{{ $user->gender }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Password</p>
                                <p class="mt-1 text-gray-900 dark:text-white">{{ $passwordStars }}</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">NIK</p>
                                <p class="mt-1 text-gray-900 dark:text-white">*****</p>
                            </div>
                            
                            <div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone Number</p>
                                <p class="mt-1 text-gray-900 dark:text-white">{{ $user->numberphone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="p-6 flex justify-center flex-col space-y-4">                        
                        <a href="{{ route('profile.edit', ['id' => Auth::id()]) }}" class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-3 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            Edit Profil
                        </a>
                        
                        <div class="text-center text-sm text-gray-500 dark:text-gray-400">OR</div>
                        
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="w-full sm:w-auto inline-flex justify-center items-center px-4 py-3 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                            Hapus Akun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>
</x-app-layout>