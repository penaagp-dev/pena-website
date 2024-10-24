<?php

namespace App\Helper;
use Illuminate\Support\Str;

class ImageHandler{
    public static function uploadImage($file, $path, $filename){
        $fileName = $filename . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);
        return $fileName;
    }

    public static function updateImage($file, $path, $filename, $oldFile){
        $fileName = $filename . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);
        $old_file = public_path($path) . '/' . $oldFile;
        if(file_exists($old_file)){
            unlink($old_file);
        }
        return $fileName;
    }
}