<?php

namespace App\Http\Livewire\Mobil;

use App\Helpers\Helper;
use App\Models\Mobil;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;

class TambahModal extends Component
{
    use WithFileUploads;
    protected $rules = [
        'nama' => 'required',
        'brand' => 'required',
        'mesin' => 'required',
        'seat' => 'required',
        'bahan_bakar' => 'required',
        'transmisi' => 'required',
        'harga' => 'required',
        'gambar_mobil' => 'nullable|image|mimes:jpg,png,jpeg'
    ];

    public $tambahkanMobil = false;

    public $nama = '';
    public $brand = '';
    public $mesin = '';
    public $seat = '';
    public $harga = '';
    public $bahan_bakar = '';
    public $transmisi = '';
    public $gambar_mobil;
    public $gambarurl;

    
    public function tambahMobil()
    {
        $this->resetErrorBag();

        $this->tambahkanMobil = true;
    }

    public function masukMobil()
    {
        // dd($this);
        $this->validate();
        $path = $this->gambar_mobil->store('mobil');

        $kode_mobil = Helper::PesananIDGenerator(new Mobil, 'kode_mobil', 5, 'M');

        $mobil = Mobil::create([
            'nama' => $this->nama,
            'brand' => $this->brand,
            'kode_mobil' => $kode_mobil,
            'mesin' => $this->mesin,
            'seat' => $this->seat,
            'bahan_bakar' => $this->bahan_bakar,
            'transmisi' => $this->transmisi,
            'harga' => $this->harga,
            'gambar' => $path
        ]);

        $this->resetInput();
        $this->emit('mobilMasuk', $mobil);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Mobil berhasil ditambahkan!']);
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->brand = null;
        $this->mesin = null;
        $this->seat = null;
        $this->bahan_bakar = null;
        $this->transmisi = null;
        $this->harga = null;
        $this->gambar_mobil = null;
    }

    public function focusMyInput()
    {
        $this->dispatchBrowserEvent('focusInput');
    }

    public function render()
    {
        return view('livewire.mobil.tambah-modal');
    }
}
