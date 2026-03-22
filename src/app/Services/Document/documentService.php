<?php

namespace App\Services\Document;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class documentService
{
    public function getFilesInfos(String $fileFolder, String $fileName)
    {
        $filePath = storage_path('app/private/'.$fileFolder.'/' . $fileName);
        $size = File::size($filePath);
        $megabytes = $size / 1024 / 1024;
        $nbr = number_format($megabytes, 2) . ' MB';
        $mime = File::mimeType($filePath);
        $type = explode('/', $mime)[1];
        $data = [$type, $nbr];
        return $data;
    }
}
