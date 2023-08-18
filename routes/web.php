<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/mobil', function () {
        return view('livewire.mobil.show');
    })->name('mobil');
    Route::get('/pesanan', function () {
        return view('livewire.pesanan.show');
    })->name('pesanan');
    Route::get('/invoice', function () {
        return view('livewire.invoice.show');
    })->name('invoice');
});
