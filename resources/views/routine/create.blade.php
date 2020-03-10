@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header">{{__('routine.createTitle')}}</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('routine.save') }}">
            @csrf
            <input type="hidden" name="training_id" value="{{$data['training_id']}}">
            <input type="number" min=0 class="form-control" placeholder="{{__('routine.repetitionsField')}}" name="repetitions" value="{{ old('repetitions') }}" />
            <br />
            <input type="number" min=0  class="form-control" placeholder="{{__('routine.sequencesField')}}" name="sequences" value="{{ old('sequences') }}" />
            <br />
            <input type="number" min=0  class="form-control" placeholder="{{__('routine.secondsToRestField')}}" name="seconds_to_rest" value="{{ old('seconds') }}" />
            <br />
            <select class="custom-select" name="exercise_id">
              <option selected>{{__('routine.select')}}</option>
              @foreach($data["exercises"] as $exercise)
              <option value="{{$exercise->getId()}}">{{$exercise->getName()}}</option>
              @endforeach

            </select>
            <br />
            <br />
            <input type="submit" class="btn btn-primary form-control" value="{{__('routine.create')}}" />
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection