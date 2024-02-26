<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDep;

class UserLogin extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = UserDep::where('email', $credentials['email'])->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        if (password_verify($credentials['password'], $user->password)) {

            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
