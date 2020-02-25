<?php

namespace App\Http\Controllers;
use App\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function create()
    {
        return view('record.createRecord');
    }

    public function list(){
      $data = []; //to be sent to the view
      $data["title"] = "Records";
      $data["records"] = Record::all();

      return view('record.listRecords')->with("data",$data);
    }

    public function sort($order){
      $data = []; //to be sent to the view
      $data["title"] = "Records";
      $data["records"] = Record::orderBy($order)->get();

      return view('record.listRecords')->with("data",$data);
      return back()->with("data",$data);
    }



    public function show($id)
  {
      $data = []; //to be sent to the view
      $record = Record::findOrFail($id);


      $data["title"] = "Record";
      $data["record"] = $record;
      return view('record.showRecord')->with("data",$data);
  }

    public function delete($id)
  {
      Record::where('id', $id)->delete();
      return redirect()->route('record.listRecords');
  }


    public function save(Request $request){

      $request->validate([
        "name" => "required|regex:/^[\pL\s\-]+$/u",
        "weight" => "required|numeric|min:0",
        "height" => "required|numeric|min:0",
        "imc" => "required|numeric|min:0"
      ]);

      Record::create($request->only(["name","weight","height","imc"]));
      return back()->with('success','Record created successfully!');
    }

}
