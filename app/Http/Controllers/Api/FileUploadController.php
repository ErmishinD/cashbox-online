<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

/**
 * @authenticated
 * @group File Upload endpoints
 */
class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $folder = uniqid() . '-' . now()->timestamp;
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->storeAs('tmp/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);
            return response($folder)->header('Content-Type', 'text/plain');
        }

        return '';
    }
}
