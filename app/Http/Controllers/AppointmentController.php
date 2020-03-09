<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{

  public function create()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('appointment.createAppointment');
    return view('appointment.create')->with('data', $data);
  }

  public function save(Request $request)
  {
    Appointment::validate($request);
    Appointment::create($request->only(['date', 'description', 'user_id']));
    return back()->with('success', __('appointment.appointmentCreated'));
  }


  public function list($user_id)
  {
    $data = []; //to be sent to the view
    $data['title'] = __('appointment.list');
    $data['appointments'] = Appointment::where('user_id', $user_id)->get();
    return view('appointment.list')->with('data', $data);
  }


  public function delete($id){
    Appointment::destroy($id);
    return redirect('appointment/list');
  }

}
