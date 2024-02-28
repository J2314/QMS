<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;

class FormRetrieve extends Controller
{
    public function getForms()
    {
        $forms = Forms::all();
        return response()->json($forms);
    }
}
