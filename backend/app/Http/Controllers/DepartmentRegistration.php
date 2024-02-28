<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentRegistration extends Controller
{  
    public function addDepartment(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);
    
        try {
            $department = new Department();
    
            $department->name = $validatedData['name'];
            $department->code = $validatedData['code']; 
    
            $department->save();
    
            return response()->json(['message' => 'Department added successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add department'], 500);
        }
    }
    
}
