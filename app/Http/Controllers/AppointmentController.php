<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Appointment;
use App\User;

class AppointmentController extends Controller
{

  public function create($userId)
  {
    $data = []; //to be sent to the view
    $data['title'] = __('appointment.createAppointment');
    $data['userId'] = $userId;
    return view('appointment.create')->with('data', $data);
  }

  public function save(Request $request, $userId)
  {
    $field = $request->only(['date', 'time', 'description', 'trainer_id']);
    $field['user_id'] = $userId;
    Appointment::validate($request);
    Appointment::create($field);
    return back()->with('success', __('appointment.appointmentCreated'));
  }


  public function list($userId)
  {
    $data = []; //to be sent to the view
    $data['title'] = __('appointment.list');

    $data['appointments'] = Appointment::join('users','users.id' , '=', 'appointments.trainer_id')
    ->select('appointments.*', 'users.name')
    ->where('user_id', $userId)->get();
    //$data['appointments'] = Appointment::where('user_id', $userId)->get();
    return view('appointment.list')->with('data', $data);
  }


  public function delete($id){
    Appointment::destroy($id);
    if(Auth::user()->getRole() == 1){
      return redirect('/appointment/list/'.Auth::user()->getId());
    }
    return redirect('/trainer/appointment/list/'.Auth::user()->getId());

  }

}
