<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\APi\MobilController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PesananController;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/coba', function(){
    return "User";
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']], function(){

    Route::post('/search', [MobilController::class, 'search']);
    Route::get('/list', [MobilController::class, 'list']);
    Route::get('/beranda', [PesananController::class, 'count']);

    Route::prefix('notification')->group(function(){
        Route::get('/index', [NotificationController::class, 'index']);
    });

    Route::prefix('mobil')->group(function(){
        Route::get('/show/{kode_mobil}', [MobilController::class, 'show']);
    });

    Route::prefix('pesanan')->group(function(){
        Route::get('/show/{kode_pesanan}', [PesananController::class, 'show']);
        Route::get('/list', [PesananController::class, 'index']);
        Route::get('/form', [PesananController::class, 'form']);
        Route::post('/tambah', [PesananController::class, 'store']);
        Route::post('/updateJemput/{kode_pesanan}', [PesananController::class, 'updateToPengembalian']);
    });

    Route::prefix('invoice')->group(function(){
        Route::get('/show/{kode_invoice}', [InvoiceController::class, 'show']);
        Route::post('/buktiTransfer', [InvoiceController::class, 'updateImage']);
    });

    Route::prefix('user')->group(function(){
        Route::get('/profile', [UserController::class, 'show']);
        // Route::post('/update', [UserController::class, 'update']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);

});
