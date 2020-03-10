<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Appointment;
use App\User;
use Mail;

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
    $appointment = Appointment::create($field);
    $trainer = User::where('id', $field['trainer_id'])->first();
    $user = User::where('id', $field['user_id'])->first();
    $this->sendEmail($user->getName(), $user->getEmail(), $field["date"]." ".$field["time"]);
    $this->sendEmail($trainer->getName(), $trainer->getEmail(), $field["date"]." ".$field["time"]);
    return back()->with('success', __('appointment.appointmentCreated'));
  }

  public function sendEmail($to_name, $to_email, $date){

    $data = array('name'=> $to_name, 'body' => 'Gym');
    Mail::send([], $data, function($message) use ($to_name, $to_email, $date) {
      $message->to($to_email, $to_name)
      ->subject(__('appointment.newAppointment')." ".$date);
      $message->from("gym.oeste.noreply@gmail.com","");
    });
  }

  public function list($userId)
  {
    $data = []; //to be sent to the view
    $data['title'] = __('appointment.list');
    if(Auth::user()->getRole() == 2){
      $data['appointments'] = Appointment::join('users','users.id' , '=', 'appointments.trainer_id')
      ->select('appointments.*', 'users.name')
      ->where('trainer_id', $userId)->get();
    }else{
      $data['appointments'] = Appointment::join('users','users.id' , '=', 'appointments.trainer_id')
      ->select('appointments.*', 'users.name')
      ->where('user_id', $userId)->get();
    }


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
