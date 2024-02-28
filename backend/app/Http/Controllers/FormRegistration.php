<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;

class FormRegistration extends Controller
{
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'departmentName' => 'required|string',
            'departmentCode' => 'required|string',
            'departmentId' => 'required|numeric',
        ]);

        $formData = new Forms();
        $formData->name = $validatedData['departmentName'];
        $formData->code = $validatedData['departmentCode'];
        $formData->department_id = $validatedData['departmentId'];
        $formData->save();
        
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
