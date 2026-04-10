<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function downloadDiplome($fileName)
    {
        $path = 'diplomes/' . $fileName;
        if (!Storage::exists($path)) {
            return;
        }
        // return Storage::download($path);
        return Storage::download($path, $fileName);
        // return response()->download(storage_path('/storage/app/files/'.$file));
    }

    public function downloadCIN($fileName)
    {
        // $filePath = storage_path('app/cin/' . $fileName);
        //full pth "/var/www/storage/app/cin/1771678332_CIN_Anouar Hamza (2).pdf"
        $filePath = 'cin/' . $fileName;
        if (!Storage::disk('local')->exists($filePath)) {
            return 'nooop';
        }
        //documment get sous form..1�npJ$6N�p����
        $contents = Storage::disk('local')->get($filePath);
        return Storage::download($filePath, $fileName);
        // return Storage::disk('local')->download($filePath, $fileName);

    }

    public function showCIN($fileName)
    {
        $path = 'cin/' . $fileName;
        if (!Storage::disk('local')->exists($path)) {
            return;
        }
        $fullPath = Storage::disk('local')->path($path);
        $file = Storage::disk('local')->get($path);
        $type = File::mimeType($fullPath);
        return response($file, 200)->header('Content-Type', $type);
    }
    
    public function showDiplome($fileName)
    {
        $filePath = storage_path('app/private/diplomes/' . $fileName);

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
