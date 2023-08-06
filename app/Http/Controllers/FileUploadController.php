<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    public function fileUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_data' => 'required|mimes:xlsx|max:2024'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        } else {
            $my_file = $request->file('file_data');
            $file_path = $my_file->store('ExcelData');
        }
        
    }
}
