<?php

namespace App\Http\Livewire\Mobil;

use App\Models\Mobil;
use Livewire\Component;

class Table extends Component
{
    public $hapusMobil = false;
    public $delid = '';

    protected $listeners = [
        'mobilMasuk' => 'handleMasuk'
    ];
    public function render()
    {
        // $mobil = Mobil::find(1);
        // $mobil = Mobil::whereHas('pesanan', function ($query){
        //     $query->whereNot('tanggal_rental_mulai', 'like', '2023-06-03');
        // })->get();
        // // foreach($mobil->spek as $s){

        // // }
        // dd($mobil);
        return view('livewire.mobil.table', [
            'mobils' => Mobil::all()
        ]);
    }

    public function destroy($id)
    {
        $this->resetErrorBag();

        $this->delid = $id;
        $this->hapusMobil = true;
    }

    public function handleMasuk($mobil)
    {
        
    }


    public function hapusMobil()
    {
        Mobil::destroy($this->delid);
        $this->hapusMobil = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Mobil telah berhasil dihapus!']);
    }
}
