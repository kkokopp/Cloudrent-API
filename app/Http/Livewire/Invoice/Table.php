<?php

namespace App\Http\Livewire\Invoice;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Pesanan;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    public function render()
    {
        $admin = Auth::user();
        $notif = $admin->unreadNotifications;
        $invoice_notif = [];

        foreach($notif as $n)
        {
            if($n->type == 'App\Notifications\UploadTransfer')
            {
                $invoice_notif[] = $n;
                // dd($pesanan_notif);
            }
        }
        // dd($pesanan_notif);
        
        if(!empty($invoice_notif)){
            session()->flash('flash.banner', 'Terdapat tagihan yang telah upload bukti pembayaran!');
        }

        return view('livewire.invoice.table', [
            'invoices' => Invoice::all()
        ]);
    }

    public function updateToLunas($id)
    {
        $admin = User::where('username', 'admin')->first();
        $now = Carbon::now();
        $invoice = Invoice::where('id', $id)->first();
        $invoice->update(['status_id' => 1]);
        $admin->unreadNotifications()
        ->whereJsonContains('data->invoice_id', $id)
        ->update(['read_at' => $now]);
        session()->forget('flash.banner');


        Pesanan::where('kode_pesanan', $invoice->pesanan->kode_pesanan)->update(['status_id' => 3]);
    }
    public function updateToBelumLunas($id)
    {
        $admin = User::where('username', 'admin')->first();
        $now = Carbon::now();
        $invoice = Invoice::where('id', $id)->first();
        $invoice->update(['status_id' => 2]);
        $admin->unreadNotifications()
        ->whereJsonContains('data->invoice_id', $id)
        ->update(['read_at' => $now]);
        session()->forget('flash.banner');


        Pesanan::where('kode_pesanan', $invoice->pesanan->kode_pesanan)->update(['status_id' => 2]);
    }
}
