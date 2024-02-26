<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDep;

class UserReg extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);


        $user = UserDep::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 200);
    }
}
