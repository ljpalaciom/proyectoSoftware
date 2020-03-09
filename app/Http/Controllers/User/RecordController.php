<?php

namespace App\Http\Controllers;
use App\Record;
use App\Charts\RecordChart;
use Illuminate\Http\Request;

class RecordController extends Controller
{


    public function list(){


      $record = Record::all();
      $data = []; //to be sent to the view
      $data["title"] = "Records";
      $data["records"] = $record;

      $chart = new RecordChart;
      $chart->labels($record->pluck('created_at')->pluck('month')->all());
      $chart->dataset('Weight by month', 'line', $record->pluck('weight')->all());
      return view('record.list', compact('chart'))->with("data",$data);
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

}
