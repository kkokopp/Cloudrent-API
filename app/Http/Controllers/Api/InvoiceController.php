<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UploadTransfer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class InvoiceController extends Controller
{
    //
    public function updateImage(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,png,jpeg'
        ]);


        $gambar = $request['gambar']->store('bukti_pembayaran');

        $invoice = Invoice::where('no_invoice', $request->session()->get('no_invoice', 'default'))
        ->update(['gambar_invoice' => $gambar]);

        if($invoice){
            $invoice = Invoice::where('no_invoice', $request->session()->get('no_invoice', 'default'))->first();
            $admin = User::where('username', 'admin')->first();
            Notification::send($admin, new UploadTransfer($invoice));
            $invoice->update(["status_id" => 3]);
            return response()->json([
                'message' => 'Upload Bukti Berhasil!'
            ]);
        }else{
            return response()->json([
                'message' => 'Upload Bukti Belum Berhasil!'
            ]);
        }

    }

    public function show(Request $request, $id)
    {
        $invoice = Invoice::where('no_invoice', $id)->first();
        Session::put('no_invoice', $invoice->no_invoice);
        
        return response()->json([
            'invoice_detail' => $invoice
        ]);
    }
}
