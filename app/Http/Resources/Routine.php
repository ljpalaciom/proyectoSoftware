<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class Routine extends JsonResource

{

  public function toArray($request)
  {
    $exercise = $this->exercise;
    $path_image = $exercise->getPathImage();
    if(!is_null($path_image)){
        $image = "data:image/jpeg;base64,".base64_encode(file_get_contents(URL::asset('storage/'. $path_image)));
        $exercise->setPathImage($image);
    }

    return [
      'id' => $this->getId(),
      'exercise' => $this->exercise,
      'sequences' =>  $this->getSequences(),
      'seconds_to_rest' =>  $this->getSecondsToRest(),
    ];

  }

}
