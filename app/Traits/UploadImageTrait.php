<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadImageTrait{
    public function ImageFilePathHandling(Request $request, $imageInputName, $path){
        if($request->hasFile($imageInputName)){
            $image = $request->{$imageInputName};
            $imageNameChange = Str::uuid().'__'.Str::slug($image->getClientOriginalExtension());
            $image->move(public_path($path), $imageNameChange);
            return $path.'/'.$imageNameChange;
        }
    }
}


?>