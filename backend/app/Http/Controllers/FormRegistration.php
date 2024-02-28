<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;

class FormRegistration extends Controller
{
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'file_name' => 'required|string',
            'file_code' => 'required|string',
            'department_id' => 'required|numeric',
        ]);
    
        $formData = new Forms();
        $formData->file_name = $validatedData['file_name'];
        $formData->file_code = $validatedData['file_code'];
        $formData->department_id = $validatedData['department_id'];
        $formData->is_removed = false; 
        $formData->save();
        
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
