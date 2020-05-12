@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-8">

      <div class="card">
        <div class="card-header">{{__('training.training')}}</div>

        <table  class="table table-striped">
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
              <td><a href="{{ route('routine.listUser', ['trainingId' =>$training->getId()] ) }}"> {{__('training.show')}} </a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
