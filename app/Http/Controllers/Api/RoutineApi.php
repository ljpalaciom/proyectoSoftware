<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Routine as RoutineResource;

use App\Http\Resources\Routines as RoutineCollection;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Routine;

class RoutineApi extends Controller

{

  public function index()

  {
    return new RoutineCollection(RoutineResource::collection(Routine::with('exercise:id,name,description,path_image')->get()));
  }

  public function paginate()

  {

    return new RoutineCollection(Routine::with('exercise:id,name,description')->paginate(5));

  }

}
