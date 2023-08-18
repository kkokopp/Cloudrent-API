<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public function render()
    {
        $admin = Auth::user();
        $notif = $admin->unreadNotifications;
        $pesanan_notif = [];
        $transfer_notif = [];

        foreach($notif as $n)
        {
            if($n->type == 'App\Notifications\ConfirmPesanan')
            {
                $pesanan_notif[] = $n;
                // dd($pesanan_notif);
            }elseif($n->type == 'App\Notifications\UploadTransfer')
            {
                $transfer_notif[] = $n;
                // dd($transfer_notif);
            }
        }
        // dd(count($pesanan_notif));


        // dd($transfer_notif->count());
        return view('livewire.sidebar',[
            'pesanan_notif' => $pesanan_notif,
            'transfer_notif' => $transfer_notif
        ]);
    }
}
