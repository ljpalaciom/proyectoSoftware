<?php

namespace App\Http\Controllers;
use App\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function create()
    {
        return view('record.create');
    }

    public function list(){
      $data = []; //to be sent to the view
      $data["title"] = "Records";
      $data["records"] = Record::all();

      return view('record.list')->with("data",$data);
    }

    public function sort($order){
      $data = []; //to be sent to the view
      $data["title"] = "Records";
      $data["records"] = Record::orderBy($order)->get();

      return view('record.list')->with("data",$data);
      return back()->with("data",$data);
    }



    public function show($id)
  {
      $data = []; //to be sent to the view
      $record = Record::findOrFail($id);

      $data["title"] = "Record";
      $data["record"] = $record;
      return view('record.show')->with("data",$data);
  }

    public function delete($id)
  {
      Record::destroy($id);
      return redirect()->route('record.list');
  }


    public function save(Request $request){

      Record::validate($request);
      Record::create($request->only(["name","weight","height","imc"]));
      return back()->with('success','Record created successfully!');
    }

}
