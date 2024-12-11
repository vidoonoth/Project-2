
<div>
    <h1 class="w-fit font-semibold border-b border-slate-950 text-xl mt-2 ml-6">Pengusulan</h1>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if (session()->has('message'))
        <div class="text-2xl">
            {{ session ('message') }}
        </div>
    @endif
        <form class="bg-slate-100 py-7 w-1/2 rounded-xl m-auto " action="" wire:submit="save" method="POST">
            
            {{ $this->form}}
            <x-primary-button class="ms-4">
                {{ __('Konfirmasi') }}
            </x-primary-button>
        </form>
</div>
