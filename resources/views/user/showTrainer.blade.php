@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card">
        <div class="card-header">{{ $data["user"]->getName() }}</div>
        <div class="card-body">
          <b>{{ __('user.name') }}:</b> {{ $data["user"]->getName() }}<br />
          <b>{{ __('user.lastName') }}:</b> {{ $data["user"]->getLastName() }}<br />
          <b>{{ __('user.age') }}:</b> {{ $data["user"]->getAge() }}<br />
          <b>{{ __('user.email') }}:</b> {{ $data["user"]->getEmail() }}<br />
          <br />
          <a type="button" class="btn btn-outline-dark" href="{{ route('appointment.create')}}" >{{ __('user.addAppointment') }}</a>
          <a type="button" class="btn btn-outline-dark" href="{{ route('training.create', ['id' => $data["user"]->getId()] )}}" >{{ __('training.addTraining') }}</a>
        </div>
        <br />
        <table  class="table table table-striped table-bordered">
          <!-- ADD HEADERS -->
          <thead>
            <tr>
              <th scope="col">{{__('training.name')}}</th>
              <th scope="col">{{__('training.day')}}</th>
              <th scope="col">{{__('training.duration')}}</th>
              <th scope="col">{{__('training.details')}}</th>
            </tr>
          </thead>
          <!-- BIND ARRAY TO TABLE -->
          <tbody>
            @foreach($data["trainings"] as $training)
            <tr>
              <td> {{ $training->getName() }}</td>
              <td> {{ $training->getDay() }}</td>
              <td> {{ $training->getDuration() }}</td>
              <td><a href="{{ route('routine.list', ['trainingId' =>$training->getId()] ) }}"> {{__('training.show')}} </a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
