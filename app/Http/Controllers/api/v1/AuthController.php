<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{



    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Guard olarak api kullandık
        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'expires_in'   => config('jwt.ttl') * 60 ]); // saniye cinsinden
    }




public function refresh()
{
      /** @var \Tymon\JWTAuth\JWTGuard $auth */
    $auth = auth('api');

    $newToken = $auth->refresh();

    return response()->json([
        'access_token' => $newToken,

       'expires_in'   => config('jwt.ttl') * 60 ]);
}



    public function me(){

        $user =auth('api')->user();

        return response()->json($user);


    }



    public function logout(){

         /** @var \Tymon\JWTAuth\JWTGuard $auth */
    $auth = auth('api');

    $auth->logout();

    return response()->json([
        'message' => 'logged out successfully...'
    ]);

    }





}






