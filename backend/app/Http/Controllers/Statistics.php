<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use Illuminate\Http\Request;
use App\Models\FormViewing;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

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
                
                $form = Forms::find($formId);
                if (!$form) {
                    return response()->json(['error' => 'Form not found'], 404);
                }

                $formViewing = new FormViewing();
                $formViewing->user_id = $userId;
                $formViewing->form_id = $formId;
                $formViewing->save();

                $formViewing->load('form');

                return response()->json([
                    'message' => 'Form viewing recorded successfully',
                    'form_viewing' => $formViewing,
                ], 200);
            } else {
                return response()->json(['error' => 'User not authenticated'], 401);
            }
        } catch (\Exception $e) {
            Log::error('Failed to record form view', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
