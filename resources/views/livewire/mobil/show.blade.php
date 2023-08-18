<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-8">
            <div class="flex">
                <div class="flex justify-between">
                    <div>
                        @livewire('mobil.tambah-modal')
                    </div>
                </div>
            </div>
            <div>
                @livewire('mobil.table')
            </div>
        </div>
    </div>
</x-app-layout>
