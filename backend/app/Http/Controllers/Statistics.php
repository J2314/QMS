<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormViewing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import Log facade for debugging

class Statistics extends Controller
{
    public function recordFormView(Request $request)
    {
        try {
            // Log request headers for debugging
            Log::debug('Request Headers:', $request->headers->all());

            $formId = $request->input('form_id');
            $user = Auth::guard('api')->user();
            $user = User::find($user->id);
            return response(compact('user'), 200);
            /*  if ($user) {
                $userId = $user->id;

                FormViewing::create([
                    'form_id' => $formId,
                    'user_id' => $userId,
                ]);

                return response()->json(['message' => 'Form view recorded successfully']);
            } else {
                return response()->json(['error' => 'User not authenticated'], 401);
            } */
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
