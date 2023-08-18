<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mobil;
use App\Helpers\Helper;
use App\Models\Invoice;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ConfirmPesanan;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class PesananController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        // $user = Mobil::all();
        $pesanans = Pesanan::where('user_id', $user->id)
        ->with("status")
        ->with("mobil")
        ->get();

        return response()->json([
            'pesanans'=>$pesanans
        ]);
        
    }

    public function show(Request $request, $id)
    {
        $pesanan = Pesanan::where('kode_pesanan', $id)->with("mobil")->first();

        $invoice = Invoice::where('pesanan_id', $pesanan->id)->with('status')->first();
        Session::put('no_invoice', $invoice->no_invoice);

        return response()->json([
            'pesanan_detail' => $pesanan,
            'invoice' => $invoice
        ]);
    }

    public function form(Request $request)
    {
        
        $user = Auth::user();
        $search = $request->session()->get('search', 'default');
        $kode_mobil = $request->session()->get('mobil_id', 'default');
        $total_day = $request->session()->get('total_days', 'default');
        $total_harga = $request->session()->get('total', 'default');

        $tanggal_m = $search['tanggal_mulai'];
        $tanggal_s = $search['tanggal_selesai'];

        $tanggal_s = Carbon::parse($tanggal_s);
        $tanggal_m = Carbon::parse($tanggal_m);

        return response()->json([
            'user' => $user,
            'kode_mobil' => $kode_mobil,
            'days' => $total_day,
            'total' => $total_harga,
            'search' => $search
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'email_pemesan' => 'required|email',
            'no_hp' => 'required|max:16', 
            'nama_pemesan' => 'required|string',
            'mobil_id' => 'required',
            'waktu_pengambilan' => 'required|date_format:H:i:s',
            'tanggal_rental_mulai' => 'required|date',
            'tanggal_rental_selesai' => 'required|date',
            'total' => 'required',
            'status_id' => 'required',
        ]);
        
        $user = Auth::user();
        $user_id = $user->id; 
        
        $kode_pesanan = Helper::PesananIDGenerator(new Pesanan, 'kode_pesanan', 5, 'P');
        // dd($request->all());die();
        
        $pesanans = Pesanan::create([
            'kode_pesanan' => $kode_pesanan,
            'mobil_id' => $request['mobil_id'],
            'waktu_pengambilan' => $request['waktu_pengambilan'],
            'tanggal_rental_mulai' => $request['tanggal_rental_mulai'],
            'tanggal_rental_selesai' => $request['tanggal_rental_selesai'],
            'total' => $request['total'],
            'nama_pemesan' => $request['nama_pemesan'],
            'email_pemesan' => $request['email_pemesan'],
            'no_hp' => $request['no_hp'],
            'status_id' => $request['status_id'],
            'user_id' => $user_id,
        ]);

        if($pesanans){

            // Invoice::create([
            //     'no_invoice' => 
            // ])
            // $search = session('search');
            // $search = json_encode($search);
            $admin = User::where('username', 'admin')->first();
            Notification::send($admin, new ConfirmPesanan($pesanans));
            // $admin->notify(new ConfirmPesanan($pesanans));
            return response()->json([
                'pesanans' => $pesanans,
                'message' => 'Booking berhasil terkirim',
            ]);
        }else{
            return response()->json([
                'pesanans' => $pesanans,
                'message' => 'Booking belum berhasil'
            ]);
        }
    }

    public function updateToPengembalian($kode_pesanan)
    {
        $pesanan = Pesanan::where('kode_pesanan', $kode_pesanan)->update(['status_id' => 5]);

        if($pesanan){
            return response()->json([
                'message' => 'Pesanan Berhasil di Update'
            ]);
        }
    }

    public function count()
    {
        $user = Auth::user();
        $pesanan = $user->pesanans;
        $notification = $user->unreadNotifications;
        $jmlh_notif = $notification->count();
        $jmlh_pesanan = $pesanan->count();
        return response()->json([
            'jumlah_pesanan' => $jmlh_pesanan,
            'jumlah_notifications' => $jmlh_notif
        ]);
    }
}
