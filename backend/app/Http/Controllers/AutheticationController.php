<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AutheticationController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);
        try {
            $user = User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => bcrypt($request->password),
            ]);
            $data = array(
                'message' => 'Successfully Created',
                'data' => $user
            );
            return response(compact('data'), 200);
        } catch (\Throwable $error) {
            return response([
                'message' => $error->getMessage()
            ], 402);
        }
    }
    
    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


}
