@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $data["title"] }}</div>
        <div class="card-body">
          <h1>{{__('exercise.exercise')}}</h1>

          <b>{{__('exercise.nameField')}}:</b> {{ $data["routine"]->name }}<br />
          <b>{{__('exercise.descriptionField')}}:</b> {{ $data["routine"]->description}}<br />
          <b>{{__('exercise.recommendationsField')}}:</b> {{$data["routine"]->recommendations}}<br />
          <h1>{{__('routine.routine')}}</h1>

          <b>{{__('routine.repetitionsField')}}:</b> {{ $data["routine"]->getRepetitions()}}<br />
          <b>{{__('routine.sequencesField')}}:</b> {{ $data["routine"]->getSequences() }}<br />
          <b>{{__('routine.secondsToRestField')}}:</b> {{ $data["routine"]->getSecondsToRest() }}<br />

          <video width="100%"controls>
                <source src="{{ URL::asset('storage/exercise/'. $data['routine']->path_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
          </video>
          <br />

          </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  @endsection
