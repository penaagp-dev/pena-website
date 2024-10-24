<?php

namespace App\Repositories;

use App\Http\Requests\Auth\AuthRequest;
use App\Interfaces\AuthInterfaces;
use App\Models\User;
use App\Traits\HttpResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRepositories implements AuthInterfaces
{

    use HttpResponseTrait;
    public function login(AuthRequest $request)
    {
        try {
            if(!Auth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Unauthorized'
                ], 401);
            }else{
                $user = User::where('email', $request->email)->first();
                $user->createToken('token')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login success',
                ]);
            }
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user('web')->tokens()->delete();
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json([
                'status' => 'success',
                'message' => 'Logout success',
            ]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}

