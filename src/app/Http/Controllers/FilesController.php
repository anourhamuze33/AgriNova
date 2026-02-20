<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function downloadDiplome($fileName)
    {
        $path = 'diplome/' . $fileName;
        if (!Storage::exists($path)) {
            return;
        }
        // return Storage::download($path);
        $headers = ['Content-Type' => 'application/pdf'];
        return Storage::download($path, $fileName, $headers);
        // return response()->download(storage_path('/storage/app/files/'.$file));
    }

    public function downloadCIN($fileName)
    {
        $filePath = storage_path('app/cin/' . $fileName);

        // if (!Storage::disk('local')->exists($filePath)) {
        if (!file_exists($filePath)) {
            return;
        }
        return response()->download($filePath);
    }

    public function showDiplome($fileName)
    {
        $path = 'diplome/' . $fileName;
    if (!Storage::disk('local')->exists($path)) {
        return;
    }
    $fullPath = Storage::disk('local')->path($path);
    $file = Storage::disk('local')->get($path);
    $type = File::mimeType($fullPath);
    return response($file, 200)->header('Content-Type', $type);

    }
}
