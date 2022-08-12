<?php

namespace App\Http\Helpers;

use Illuminate\Http\Request;
use App\Models\File;

class FileManager{
    public function upload(Request $request, $path){
        $file = $request->file('file');
        $file->store('public/'+$path);
        $file->save();
        return $file;
    }
}