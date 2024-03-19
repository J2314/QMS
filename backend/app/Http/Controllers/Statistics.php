<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormViewing;
use Illuminate\Support\Facades\Auth;

class Statistics extends Controller
{
    public function recordFormView(Request $request)
    {
        try {
            $formId = $request->input('form_id');
            $user = auth()->user(); 

            if ($user) {
                $userId = $user->id;

                FormViewing::create([
                    'form_id' => $formId,
                    'user_id' => $userId,
                ]);

                return response()->json(['message' => 'Form view recorded successfully']);
            } else {
                return response()->json(['error' => 'User not authenticated'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
