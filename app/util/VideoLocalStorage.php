<?php

namespace App\Util;

use App\Interfaces\VideoStorage;
use Illuminate\Support\Facades\Storage;

class VideoLocalStorage implements VideoStorage {

  public static function store($request, $exercise){
    if($request->hasFile('video')) {
      $extension = $request->file('video')->getClientOriginalExtension();
      $pathVideo = "exercise/".$exercise->getId().".{$extension}";
      Storage::disk('public')->put($pathVideo, file_get_contents($request->file('video')->getRealPath()));
      $exercise->setPathVideo($pathVideo);
      $exercise->save();
    }
  }
}
