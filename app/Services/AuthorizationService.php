<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthorizationService
{
    public function signIn($email, $password)
    {
        if (!Auth::attempt([
            'email' => $email,
            'password' => $password
        ]))
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        $user = Auth::user();
        $token = $user->createToken('Personal access token')->accessToken;
        return $token;
    }
}
