<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormFiles;

class ViewContent extends Controller
{
    public function fetchFileContentById($id)
    {
        $file = FormFiles::find($id);
    
        if (!$file) {
            return response()->json(['error' => 'File not found'], 404);
        }
    
        $filePath = public_path($file->file_path);
    
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }
    
        $fileContent = file_get_contents($filePath);
        $fileMimeType = mime_content_type($filePath);
    
        return Response::make($fileContent, 200, [
            'Content-Type' => $fileMimeType,
            'Content-Disposition' => 'inline',
        ]);
    }
}
