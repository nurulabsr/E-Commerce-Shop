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
}
