<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait UploadImageTrait
{
    public function ImageFilePathHandling(Request $request, $imageInputName, $path)
    {
        if ($request->hasFile($imageInputName)) {
            $image = $request->file($imageInputName);
            $uniqueIdentifier = Str::uuid();
            $originalExtension = $image->getClientOriginalExtension();
            $newFilename = $uniqueIdentifier . '.' . $originalExtension;
            $image->move(public_path($path), $newFilename);
            return $path . '/' . $newFilename;
        }
    }


    public function UpdateImageFilePathHandling(Request $request, $imageInputName, $path, $oldPath=null)
    {
        if ($request->hasFile($imageInputName)) {
            if(File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }
            $image = $request->file($imageInputName);
            $uniqueIdentifier = Str::uuid();
            $originalExtension = $image->getClientOriginalExtension();
            $newFilename = $uniqueIdentifier . '.' . $originalExtension;
            $image->move(public_path($path), $newFilename);
            return $path . '/' . $newFilename;
        }
    }


    public function DeleteImage(string $path){
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }

    public function MultipleImageFilePathHandling(Request $request, $imageInputName, $path)
    {   
        if ($request->hasFile($imageInputName)) {
            $paths = [];
            $images = $request->file($imageInputName);
            foreach ($images as $image) {
                $uniqueIdentifier = Str::uuid();
                $originalExtension = $image->getClientOriginalExtension();
                $newFilename = $uniqueIdentifier . '.' . $originalExtension;
                $image->move(public_path($path), $newFilename);
                $paths[] = $path . '/' . $newFilename;
            }
            return $paths;
        }
    }
    
}
