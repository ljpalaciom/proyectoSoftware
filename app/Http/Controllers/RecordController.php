<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function create()
    {
        return view('record.createRecord');
    }

    public function list(){
        return view('record.listRecords');
    }


    public function save(Request $request){

      $request->validate([
        "name" => "required|regex:/^[\pL\s\-]+$/u",
        "weight" => "required|numeric|min:0",
        "height" => "required|numeric|min:0",
        "imc" => "required|numeric|min:0"
      ]);

      dd($request->all());
    }
}
