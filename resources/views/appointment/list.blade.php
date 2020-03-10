@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <br />
  <div>
    @if(count($data["appointments"])==0)
    <h1 align="center">{{ __('appointment.noAppointments') }}</h1>
    @else
    <h1 align="center">{{ __('appointment.list') }}</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">{{ __('appointment.date') }}</th>
          <th scope="col">{{ __('appointment.time') }}</th>
          <th scope="col">{{ __('appointment.trainer') }}</th>
          <th scope="col">{{ __('appointment.description') }}</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($data["appointments"] as $appointment)
        <tr>
          <td> {{ $appointment->getDate() }} </td>
          <td> {{ $appointment->getTime() }} </td>
          <td> {{ $appointment->getTrainerId() }} </td>
          <td> {{ $appointment->getDescription() }} </td>
          <td>
            @if(Auth::user()->getRole() == 2)
            <form method="POST" action="{{ route('appointment.deleteTrainer', $appointment->getId()) }}">
            @else
            <form method="POST" action="{{ route('appointment.deleteUser', $appointment->getId()) }}">
            @endif
              @csrf
              <div class="row justify-content-center">
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </div>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
