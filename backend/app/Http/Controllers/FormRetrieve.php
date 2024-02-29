<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;

class FormRetrieve extends Controller
{
    public function getForms()
    {
        $forms = Forms::where('is_removed', false)->get();
        
        return response()->json($forms);
    }
}
