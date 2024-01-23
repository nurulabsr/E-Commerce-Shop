<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadImageTrait
{
    public function ImageFilePathHandling(Request $request, $imageInputName, $path)
    {
        if ($request->hasFile($imageInputName)) {
            $image = $request->file($imageInputName);

            // Generate a unique identifier
            $uniqueIdentifier = Str::uuid();

            // Get the original extension
            $originalExtension = $image->getClientOriginalExtension();

            // Generate a new filename with a unique identifier and the original extension
            $newFilename = $uniqueIdentifier . '.' . $originalExtension;

            // Move the uploaded file to the desired path with the new filename
            $image->move(public_path($path), $newFilename);

            // Return the full file path
            return $path . '/' . $newFilename;
        }
    }
}
