<?php

namespace App\Services;

use App\Models\TemporaryFile;

class UploadFileService
{

    public static function save_photo($photo, $model)
    {
        $temporaryFile = TemporaryFile::where('folder', $photo)->first();
        if ($temporaryFile) {
            $model->addMedia(storage_path('app/tmp/' . $photo . '/' . $temporaryFile->filename))
                ->toMediaCollection('photo');
            rmdir(storage_path('app/tmp/' . $photo));
            $temporaryFile->delete();
        }
    }
}


