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
          <th scope="col">{{ __('appointment.description') }}</th>
          @if(Auth::user()->getRole() == 2)
          <th scope="col">{{ __('appointment.user') }}</th>
          <th scope="col">{{ __('appointment.update') }}</th>
          @else
              <th scope="col">{{ __('appointment.trainer') }}</th>
          @endif
          <th scope="col">{{ __('appointment.cancel') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data["appointments"] as $appointment)
        <tr>
          <td> {{ $appointment->getDate() }} </td>
          <td> {{ $appointment->getTime() }} </td>
          <td> {{ $appointment->getDescription() }} </td>

          @if(Auth::user()->getRole() == 2)
            <td> {{ $appointment->user->getName() }} </td>
            <td>
              <a class="btn btn-primary" href="{{ route('appointment.update', ['id' => $appointment->getId()])}}">{{__('appointment.update')}}</a>
            </td>
          @else
            <td> {{ $appointment->trainer->getName() }} </td>
          @endif


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
