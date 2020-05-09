<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Routine extends JsonResource

{

  public function toArray($request)

  {
    return [
      'id' => $this->getId(),
      'exercise' => $this->exercise,
      'sequences' =>  $this->getSequences(),
      'seconds_to_rest' =>  $this->getSecondsToRest(),
    ];

  }

}
