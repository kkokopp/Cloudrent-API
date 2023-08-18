
<div>
    <x-button-green wire:click="tambahMobil" wire:loading.attr="disabled">
            {{ __('Tambah') }}
    </x-button-green>
    
    <!-- Delete User Confirmation Modal -->
    <form action="POST" class="mt-5" wire:submit.prevent="masukMobil" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dialog-modal wire:model="tambahkanMobil">
            <x-slot name="title">
                {{ __('Tambah Mobil') }}
            </x-slot>
        
            <x-slot name="content">
                {{ __('Tambahkan informasi mobil secara lengkap!') }}
                    <div class="relative z-0 w-full mb-6 group">
                        <x-input-form type="text" wire:model="nama" name="nama" id="nama" placeholder="{{ _('Nama') }}" required />
                        <x-input-error for="nama" class="mt-2" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <x-input-form  type="text" wire:model="brand" name="brand" id="brand" placeholder="{{ _('Brand') }}" required />
                        <x-input-error for="brand" class="mt-2" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <x-input-form type="text" wire:model="harga" name="harga" id="harga" placeholder="{{ _('Harga') }}" required />
                        <x-input-error for="harga" class="mt-2" />
                    </div>
                    <div class="flex justify-center">
                        <div class="mb-3 w-full">
                            <select id="bahan_bakar" wire:model="bahan_bakar" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected>Pilih jenis bahan bakar</option>
                                <option value="Minyak">Minyak</option>
                                <option value="Listrik">Listrik</option>
                            </select>
                        </div>
                    </div>
                    <x-input-error for="bahan_bakar" class="mt-2" />
                    <div class="flex justify-center">
                        <div class="mb-3 w-full">
                            <select id="seat" wire:model="seat" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected>Pilih jumlah seat</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                    <x-input-error for="seat" class="mt-2" />
                    <div class="flex justify-center">
                        <div class="mb-3 w-full">
                            <select id="mesin" wire:model="mesin" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected>Pilih CC Mesin</option>
                                <option value="1200">1200cc</option>
                                <option value="1600">1600cc</option>
                                <option value="1800">1800cc</option>
                            </select>
                        </div>
                    </div>
                    <x-input-error for="mesin" class="mt-2" />
                    <div class="flex justify-center">
                        <div class="mb-3 w-full">
                            <select id="transmisi" wire:model="transmisi" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option selected>Pilih Transmisi</option>
                                <option value="Otomatis">Otomatis</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                    </div>
                    <x-input-error for="transmisi" class="mt-2" />
                    <div class="container mb-5" wire:ignore>
                        <div class="wrapper" id="wrapper">
                            <div class="image">
                                <img id="image-preview" src=" " alt=" ">
                            </div>
                            <div class="content">
                                <div class="icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="text">
                                    No file chosen, yet!
                                </div>
                            </div>
                            <div id="cancel-btn">
                                <i class="fas fa-times"></i>
                            </div>
                            <div class="file-name text-white bg-gradient-to-r from-blue-700 to-blue-400">
                                File name here
                            </div>
                        </div>
                        {{-- <input id="default-btn" type="file" x-ref="gambar_mobil"/> --}}
                        {{-- <input id="gambar_mobil" type="file" wire:model="gambar_mobil" x-ref="gambar_mobil" hidden/> --}}
                        <input id="default-btn" for="gambar" type="file" hidden name="gambar_mobil" wire:model="gambar_mobil">
                        <button id="custom-btn" type="button" onclick="defaultBtnActive()" class="text-white bg-gradient-to-r from-blue-700 to-blue-400" >Choose a file</button>
                        <x-input-error for="file" class="mt-2" />                        
                     </div>
                </x-slot>
                
                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('tambahkanMobil')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    
                    <x-button-green class="ml-3" id="submit_button" onclick="submitClick()">
                        {{ __('Submit') }}
                    </x-button-green>
                </x-slot>
        </x-dialog-modal>
    </form>
</div>



