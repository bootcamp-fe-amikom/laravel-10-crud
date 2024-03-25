<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        $token = JWTAuth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'meta' => [
                'status' => Response::HTTP_OK,
                'message' => 'success generate token',
            ],
            'data' => [
                'token' => $token,
            ],
        ]);
    }

    public function userData(Request $request) {
        return response()->json([
            'meta' => [
                'status' => Response::HTTP_OK,
                'message' => 'success get user data',
            ],
            'data' => JWTAuth::user(),
        ]);
    }
}
