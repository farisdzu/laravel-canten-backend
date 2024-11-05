<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        //cek if email ada di database
        $user = User::where('email', $request->email)->first();


        //jika email tidak di temukan di database
        if (!$user){
            return response()->json(
                ['message' => 'User not found'
            ], 404);
        };

        //Jika password tidak benar maka ini akan muncul
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid password'
            ], 401);
        }
        //Jika email dan password benar maka ini akan muncul
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'user' => $user
            ], 200);

    }
}
