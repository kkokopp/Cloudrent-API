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
                        Kode Pesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Mobil
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Pengambilan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Penjemputan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pemesan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nomor Pemesan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                @foreach ($pesanans as $pesanan)
                <?php $no++ ?>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{ $no }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pesanan->kode_pesanan }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pesanan->mobil->kode_mobil }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Carbon\Carbon::parse($pesanan->waktu_pengambilan)->format('H:i')  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Carbon\Carbon::parse($pesanan->tanggal_rental_mulai)->format('d-M-Y') }}
                        {{-- {{ $pesanan->tanggal_rental_mulai }} --}}
                    </td>
                    <td class="px-6 py-4">
                        {{ Carbon\Carbon::parse($pesanan->tanggal_rental_selesai)->format('d-M-Y') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pesanan->user->kode_user  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pesanan->nama_pemesan  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pesanan->no_hp  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pesanan->total }}
                    </td>
                    {{-- <td class="px-6 py-4">
                        {{ $pesanan->status->name }}
                    </td> --}}
                    <td class="px-6 py-4">
                        @if ($pesanan->status->name == "Menuggu Konfirmasi")
                            <x-button-green wire:click="updateToConfirm({{ $pesanan->id }})" wire:loading.attr="disabled">
                                {{ __('Konfirmasi') }}
                            </x-button-green>
                        @elseif ($pesanan->status->name == "Menunggu Pengembalian")                             
                            <x-button-on wire:click="updateSelesai({{ $pesanan->id }})" wire:loading.attr="disabled">
                                {{ __('Menunggu Pengembalian') }}
                            </x-button-on>                            
                        @elseif ($pesanan->status->name == "Menuggu Pembayaran")                             
                            <x-button-off wire:loading.attr="disabled">
                                {{ __('Menunggu Pembayaran') }}
                            </x-button-off>                            
                        @elseif ($pesanan->status->name == "Menunggu Pengembalian Unit")                             
                            <x-button-off wire:loading.attr="disabled">
                                {{ __('Menunggu Pengembalian Unit') }}
                            </x-button-off>                            
                        @elseif ($pesanan->status->name == "Menunggu Penjemputan")                             
                            <x-button-blue wire:click="updatePengembalian({{ $pesanan->id }})" wire:loading.attr="disabled">
                                {{ __('Menunggu Penjemputan') }}
                            </x-button-blue>                          
                        @endif
                    </td>
                    {{-- <td class="px-6 py-4">
                        <img src="{{ asset('storage/'. $mobil->gambar) }}" class="h-20" alt="">
                    </td> --}}
                    
                    {{-- <td class="px-6 py-4">
                        <x-button-blue wire:click="edit({{ $pesanan->id }})" wire:loading.attr="disabled">
                            {{ __('Edit') }}
                        </x-button-blue>
                        <x-danger-button class="my-1" wire:click="destroy({{ $pesanan->id }})" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-danger-button>
                    </td>  --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <x-dialog-modal wire:model="hapusMobil">
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
        </x-dialog-modal> --}}
    </div>
</div>
@if ($bannerMessage)
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.emit('banner-message', @json($bannerMessage));
    });
</script>
@endif
</div>
