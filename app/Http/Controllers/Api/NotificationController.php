<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $notifikasi = $user->notifications;

        $user->unreadNotifications->markAsRead();

        return response()->json([
            // 'user' => $user,
            'notifikasi' => $notifikasi,
        ]);
    }
}
