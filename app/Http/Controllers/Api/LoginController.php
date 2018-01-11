<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password' =>$request->password]))
        {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['success'=>true, 'token'=>$token], 200);
        }
        else
        {
            return response()->json(['error'=>'Unauthorized'], 401);
        }
    }
}
