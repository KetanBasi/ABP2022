<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $att = Auth::attempt($credentials);

        $status = 401;
        $response = [
            'error' => 'Proses masuk gagal. Silakan coba kembali.',
            'extr' => $att,
            'extra' => $credentials,
        ];

        if ($att) {
            $status = 200;
            $token = $request->user()->createToken('access_token')->plainTextToken;
            $response = [
                'access_token' => $token,
                'token_type' => 'Bearer',
            ];
        }

        return response()->json($response, $status);
    }
}
