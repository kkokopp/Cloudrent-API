<?php

namespace App\Http\Livewire\Pesanan;

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Invoice;
use App\Models\Pesanan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ConfirmedPesanan;
use Illuminate\Support\Facades\Notification;

class Table extends Component
{
    public $bannerMessage = false;

    public function render()
    {
        $admin = Auth::user();
        $notif = $admin->unreadNotifications;
        $pesanan_notif = [];

        foreach($notif as $n)
        {
            if($n->type == 'App\Notifications\ConfirmPesanan')
            {
                $pesanan_notif[] = $n;
                // dd($pesanan_notif);
            }
        }
        // dd($pesanan_notif);
        
        if(!empty($pesanan_notif)){
            session()->flash('flash.banner', 'Terdapat pesanan baru yang belum dikonfirmasi!');
        }

        return view('livewire.pesanan.table',[
            'pesanans' => Pesanan::all()
        ]);
    }

    public function updateToConfirm($id)
    {
        $admin = User::where('username', 'admin')->first();
        $pesanan = Pesanan::where('id', $id)->first();
        $user = User::where('id', $pesanan->user_id)->first();
        $now = Carbon::now();
        
        $admin->unreadNotifications()
        ->whereJsonContains('data->pesanan_id', $id)
        ->update(['read_at' => $now]);
        
        Invoice::create([
            'no_invoice' => Helper::InvoiceIDGenerator(new Invoice, 'no_invoice', 5, 'INV'),
            'pesanan_id' => $pesanan->id,
            'nama_bank' => 'Bank Rakyat Indonesia',
            'norek' => '089829749238',
            'status_id' => 2,
            'total' => $pesanan->total
        ]);
        $pesanan->update(['status_id' => 2]);
        Notification::send($user, new ConfirmedPesanan($pesanan));
    }
    public function updatePengembalian($id)
    {
        Pesanan::where('id', $id)->update(['status_id' => 3]);
    }
    public function updateSelesai($id)
    {
        Pesanan::where('id', $id)->update(['status_id' => 4]);
    }
}
