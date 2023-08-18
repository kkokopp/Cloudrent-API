<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Mobil;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Notifications\UploadTransfer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;

class MobilController extends Controller
{
    //
    public function search(Request $request)
    {
        Session::put('search', $request->all());
        $tanggal_m = $request->input('tanggal_mulai');
        $tanggal_s = $request->input('tanggal_selesai');
        $jam_p = $request->input('jam_pengembalian');
                // $mobil = Mobil::whereHas('pesanan', function ($query){
        //     $query->whereNot('tanggal_rental_mulai', 'like', '2023-06-03');
        // })->get();
        // // foreach($mobil->spek as $s){
        $results = Mobil::whereDoesntHave('pesanan')
        ->orwhereDoesntHave('pesanan', function ($query) use ($tanggal_m, $tanggal_s, $jam_p){
            $query->where('tanggal_rental_mulai', 'like', $tanggal_m)
            ->orwhere('tanggal_rental_selesai', 'like', $tanggal_s);
        })->get();


        if($results->count() !== 0 ){
            return response()->json([
                'mobil' => $results,
                'message' => 'mencari berhasil',
                'search' => Session::get('search')
            ]);
        }else{
            return response()->json([
                'mobil' => $results,
                'message' => 'Mobil tidak ditemukan',
                'search' => Session::get('search')
            ]);
        }

        
    }

    public function show(Request $request, $kode_mobil)
    {
        $mobil = Mobil::where('kode_mobil', $kode_mobil)->first();


        // $search = session('search');
        // $search = json_encode($search);
        $search = Session::get('search');
        $tanggal_m = $search['tanggal_mulai'];
        $tanggal_s = $search['tanggal_selesai'];
        $waktu = $search['jam_pengembalian'];
        $tanggal_s = Carbon::parse($tanggal_s);
        $tanggal_m = Carbon::parse($tanggal_m);

        $total_day = $tanggal_s->diffInDays($tanggal_m)+1;

        $mobil = Mobil::where('kode_mobil', $request['kode_mobil'])->first();
        $harga = $mobil->harga;
        $harga = (int)$harga;

        $total_harga = ($harga*$total_day)*1000;

        Session::put('total', $total_harga);
        Session::put('mobil_id', $kode_mobil);
        Session::put('total_days', $total_day);
        Session::put('waktu_jemput', $waktu);

        return response()->json([
            'days' => $total_day,
            'total' => $total_harga,
            'search' => $search,
            'mobil' => $mobil,
            'message' => 'informasi mobil'
        ]);
    }

    public function list(Request $request)
    {
        $mobil = Mobil::all();
        return response()->json([
            'mobil' => $mobil,
            'message' => 'mencari berhasil'
        ]);
    }
}
