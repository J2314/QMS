<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormFiles;

class FileUpload extends Controller
{  
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,jpg,jpeg,png,gif|max:4096',
            'form_id' => 'required|string|max:255',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = 'uploads/' . $filename;

            if (FormFiles::where('file_path', $path)->exists()) {
                return response()->json(['error' => 'File with the same name already exists'], 422);
            }

            $file->move(public_path('uploads'), $filename);

            $fileRecord = new FormFiles();
            $fileRecord->form_id = $request->input('form_id');
            $fileRecord->file_path = $path;
            $fileRecord->is_active = true;
            $fileRecord->save();

            return response()->json(['message' => 'File uploaded successfully', 'file_id' => $fileRecord->id]);
        }

        return response()->json(['error' => 'File upload failed'], 422);
    }

    public function retrieveUploads()
    {
        $forms = FormFiles::all();
        return response()->json($forms);
    }
}
 