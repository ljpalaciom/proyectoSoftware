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
          <br />
          <br />
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              {{__('user.selectView')}}
            </button>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('user.swipeView', 1 ) }}">{{__('user.training')}}</a>
              <a class="dropdown-item" href="{{route('user.swipeView', 2 ) }}">{{__('user.records')}}</a>
            </div>
          </div>
          <br />
          @if($viewType = Session::get('type'))
          @if($viewType==1)
          <a type="button" class="btn btn-outline-dark btn-block" href="{{ route('training.create', ['id' => $data["user"]->getId()] )}}" >{{ __('training.addTraining') }}</a>
          <br />
          <table  class="table table table-striped table-bordered">
            <!-- ADD HEADERS -->
            <thead>
              <tr>
                <th scope="col">{{__('training.name')}}</th>
                <th scope="col">{{__('training.day')}}</th>
                <th scope="col">{{__('training.duration')}}</th>
                <th scope="col">{{__('training.details')}}</th>
                <th scope="col">{{__('training.delete')}}</th>
              </tr>
            </thead>
            <!-- BIND ARRAY TO TABLE -->
            <tbody>
              @foreach($data["trainings"] as $training)
              <tr>
                <td> {{ $training->getName() }}</td>
                <td> {{ $training->getDay() }}</td>
                <td> {{ $training->getDuration() }}</td>
                <td><a href="{{ route('routine.list', ['trainingId' => $data["user"]->getId()] ) }}"> {{__('training.show')}} </a></td>
                <td>
                  <form method="POST" action="{{ route('training.delete', ['id' => $training->getId()] ) }}">
                    @csrf
                    <div class="row justify-content-center">
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{__('comment.removeButton')}}</button>
                    </div>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <a type="button" class="btn btn-outline-dark btn-block" href="{{ route('record.create', ['id' => $data["user"]->getId()] )}}" >{{ __('record.addRecord') }}</a>
          <br />
          <table  class="table table table-striped table-bordered">
            <!-- ADD HEADERS -->
            <thead>
              <tr>
                <th scope="col">{{__('record.weight')}}</th>
                <th scope="col">{{__('record.height')}}</th>
                <th scope="col">{{__('record.imc')}}</th>
                <th scope="col">{{__('record.date')}}</th>
                <th scope="col">{{__('record.delete')}}</th>
              </tr>
            </thead>
            <!-- BIND ARRAY TO TABLE -->
            <tbody>
              @foreach($data["records"] as $record)
              <tr>
                <td> {{ $record->getWeight() }}</td>
                <td> {{ $record->getHeight() }}</td>
                <td> {{ $record->getIMC() }}</td>
                <td> {{ $record->getCreatedAt() }}</td>
                <td>
                  <form method="POST" action="{{ route('record.delete', ['id' => $record->getId()] ) }}">
                    @csrf
                    <div class="row justify-content-center">
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{__('routine.removeButton')}}</button>
                    </div>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
