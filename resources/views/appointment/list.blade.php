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
          <th scope="col">{{ __('appointment.description') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data["appointments"] as $appointment)
        <tr>
          <td> {{ $appointment->getDate() }} </td>
          <td> {{ $appointment->getDescription() }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
