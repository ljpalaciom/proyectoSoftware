@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" align="center">{{ $data["title"] }}</div>
        <div class="card-body">
          <h2>{{__('exercise.exercise')}}</h2>
          <b>{{__('exercise.nameField')}}:</b> {{ $data["routine"]->name }}<br />
          <b>{{__('exercise.descriptionField')}}:</b> {{ $data["routine"]->description}}<br />
          <b>{{__('exercise.recommendationsField')}}:</b> {{$data["routine"]->recommendations}}<br /><br />
          <h2>{{__('routine.routine')}}</h2>

          <b>{{__('routine.repetitionsField')}}:</b> {{ $data["routine"]->getRepetitions()}}<br />
          <b>{{__('routine.sequencesField')}}:</b> {{ $data["routine"]->getSequences() }}<br />
          <b>{{__('routine.secondsToRestField')}}:</b> {{ $data["routine"]->getSecondsToRest() }}<br /> <br />

          @if($data['routine']->path_video)
          <video width="100%"controls>
            <source src="{{ URL::asset('storage/'. $data['routine']->path_video) }}" type="video/mp4" >
              Your browser does not support the video tag.
            </source>
          </video>
          @endif

          @if($data['routine']->path_image)
          <img width="100%" src="{{ URL::asset('storage/'. $data['routine']->path_image) }}">
          @endif
          <br />

          </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  @endsection
