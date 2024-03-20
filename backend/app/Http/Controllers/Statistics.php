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
            if (Auth::guard('sanctum')->check()) {
                $user = Auth::guard('sanctum')->user();
                
                $userId = $user->id;
                
                $formId = $request->input('form_id');
                
                if (!$formId) {
                    return response()->json(['error' => 'Form ID is required'], 400);
                }

                $formViewing = new FormViewing();
                $formViewing->user_id = $userId;
                $formViewing->form_id = $formId;
                $formViewing->save();

                return response()->json(['message' => 'Form viewing recorded successfully', 'form_viewing' => $formViewing], 200);
            } else {
                return response()->json(['error' => 'User not authenticated'], 401);
            }
        } catch (\Exception $e) {
            Log::error('Failed to record form view', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
