<div>
    <div class="mb-5"
    <form>   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <input wire:model="search" type="search" id="default-search" class="block w-full p-4 pl-5 px-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama,Kode" required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" wire:model="search">
                <svg aria-hidden="true" class="w-5 h-5 text-white dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </div>
    </form>
</div>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bahan Bakar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Seat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mesin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Transmisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gambar Mobil
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                @foreach ($mobils as $mobil)
                <?php $no++ ?>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{ $no }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $mobil->nama }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $mobil->brand }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $mobil->harga }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $mobil->bahan_bakar }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $mobil->seat }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $mobil->mesin }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $mobil->transmisi }}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/'. $mobil->gambar) }}" class="h-20" alt="">
                    </td>
                    
                    <td class="px-6 py-4">
                        {{-- <button type="button" class="px-3 py-2 text-sm text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold mx-3">Edit</button> --}}
                        {{-- <button wire:click="destroy({{ $mobil->id }})" type="button" class="px-3 py-2 text-sm text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 font-bold">Hapus</button> --}}
                        <x-button-blue wire:click="edit({{ $mobil->id }})" wire:loading.attr="disabled">
                            {{ __('Edit') }}
                        </x-button-blue>
                        <x-danger-button class="my-1" wire:click="destroy({{ $mobil->id }})" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        <x-dialog-modal wire:model="hapusMobil">
            <x-slot name="title">
                {{ __('Hapus Mobil') }}
            </x-slot>
    
            <x-slot name="content">
                {{ __('Apakah anda yakin akan menghapus mobil ini?') }}
            </x-slot>
    
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('hapusMobil')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
    
                <x-danger-button class="ml-3" wire:click="hapusMobil" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </div>
</div>
</div>
