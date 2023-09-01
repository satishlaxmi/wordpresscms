<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
{
    $mediaItems = [];
    $files = Storage::files('public/01-09-2023'); // Replace with your directory path
    
    foreach ($files as $file) {
        $url = Storage::url($file);
        $mediaItems[] = [
            'id' => pathinfo($file, PATHINFO_FILENAME),
            'name' => pathinfo($file, PATHINFO_FILENAME),
            'url' => $url
        ];
    }
    
    return response()->json($mediaItems);
}
}





