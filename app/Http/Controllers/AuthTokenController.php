<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthTokenController extends Controller
{
    public function token(Request $request){
        $token = auth('admin')->user()->createToken($request->token_name);
        return [
            'token' => $token->plainTextToken,
        ];
    }
}
