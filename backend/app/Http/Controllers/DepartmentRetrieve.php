<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentRetrieve extends Controller
{
    public function getDepartments()
    {
        $departments = Department::all();
        
        return response()->json($departments);
    }
}
