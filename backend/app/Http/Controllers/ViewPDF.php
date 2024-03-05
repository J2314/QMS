<?php

namespace App\Http\Controllers;

use App\Models\FormFiles;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ViewPDF extends Controller
{
    public function getFileContent($fileId)
    {
        $file = FormFiles::find($fileId);

        if (!$file) {
            return response()->json(['error' => 'File not found'], 404);
        }

        return response(compact('file'), 200);
    }
}
