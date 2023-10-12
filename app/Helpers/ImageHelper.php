<?php

namespace App\Helpers;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    Public static function uploadAndResizeImage($file, $folder, $width, $height)
    {
        if ($file) {
            $extension = 'webp';
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $imageName = time() . '-' . $originalName . '.' . $extension;
            $img = Image::make($file)->resize($width, $height)->encode($extension);
            Storage::disk('public')->put($folder . '/' . $imageName, $img);
            return $folder . '/' . $imageName; 
        } else {
            return null;
        }
    }
}

