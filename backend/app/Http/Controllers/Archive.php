<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;


class Archive extends Controller
{    
    public function archiveDepartment($id)
    {
        try {
            $department = Department::find($id);
            
            if (!$department) {
                return response()->json(['error' => 'Department with ID ' . $id . ' not found'], 404);
            }
    
            $department->is_Active = false; 
            $department->save();
    
            return response()->json(['message' => 'Department archived successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error archiving department: ' . $e->getMessage()], 500);
        }
    }
    
}
