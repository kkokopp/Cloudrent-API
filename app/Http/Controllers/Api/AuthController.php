<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Password as FacadesPassword;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Rules\Password;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laravel\Sanctum\PersonalAccessToken;

// use Laravel\Fortify\Http\Controllers\RegisteredUserController;

// use Illuminate\Validation\Rules\Password;

class AuthController extends RegisteredUserController
{
    protected $guard;
    protected $registrar;

    public function register(Request $request, CreatesNewUsers $creator)
    {

        $user = $creator->create($request->all());
        // dd($user);

        $token = $user->createToken('apitoken')->plainTextToken;

        return response()->json([
            'message' => 'Pendaftaran Berhasil',
            'token' => $token
        ]);
        
        // return response()->json(['message' => 'User berhasil'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            if($user instanceof \App\Models\User){
                $token = $user->createToken('auth-token')->plainTextToken;
                // $pesanan = $user->pesanans();
                return response()->json([
                    'token' => $token,
                    // 'pesanans' => $pesanan,
                    'message' => 'Login Berhasil'
                ]);
            }
        }
        return response()->json([
            'message' => 'Invalid login credentials.'
        ], 401);
    }

    // public function store(Request $request, CreatesNewUsers $creator)
    // {
    //     $creator->create($request->all());

    //     // $this->guard->login($user);

    //     return response()->json(['message' => 'Pendaftaran Berhasil']);
    // }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $request->session()->flush();
        
        return response()->json(['message' => 'Berhasil Logout']);
    }
}
