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

      $user = Auth::user();

      $data = []; //to be sent to the view
      $data["title"] = "Records";


      if($user->getRole() == 1){
        $record = Record::where('user_id', $user->getId())->get();
        $data["records"] = $record;
        $chart = new RecordChart;
        $chart->labels($record->pluck('created_at')->pluck('month')->all());
        $chart->dataset(__('record.chartTitle'), 'line', $record->pluck('weight')->all())->color("rgb(0, 102, 255)");

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

      return redirect("/record/list")->with("data",$data);
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
