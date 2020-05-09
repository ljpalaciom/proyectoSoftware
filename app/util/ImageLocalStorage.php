<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage {

  public static function store($request, $exercise){
    if($request->hasFile('image')) {
      $extension = $request->file('image')->getClientOriginalExtension();
      $pathImage = "exercise/".$exercise->getId().".{$extension}";
      Storage::disk('public')->put($pathImage, file_get_contents($request->file('image')->getRealPath()));
      $exercise->setPathImage($pathImage);
      $exercise->save();
    }
  }
}
