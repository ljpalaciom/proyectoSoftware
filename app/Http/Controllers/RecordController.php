<?php

namespace App\Http\Controllers;
use App\Record;
use App\Charts\RecordChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function create()
    {
        return view('record.create');
    }

    public function list(){
      //fake chart


      $data = []; //to be sent to the view
      $data["title"] = "Records";


      if(Auth::user()->getRole() == 1){
        $record = Record::all();
        $data["records"] = $record;
        $chart = new RecordChart;
        $chart->labels($record->pluck('created_at')->pluck('month')->all());
        $chart->dataset('Weight by month', 'line', $record->pluck('weight')->all());
        return view('record.user.list', compact('chart'))->with("data",$data);
      }else{
          $record = Record::all();
          $data["records"] = $record;
          return view('record.list')->with("data",$data);
      }

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
      return back()->with('success',__('record.recordCreated'));
    }

}
