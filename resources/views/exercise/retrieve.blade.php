@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $data["exercise"]->getName() }}</div>
        <div class="card-body">
          <b>{{__('exercise.nameField')}}:</b> {{ $data["exercise"]->getName() }}<br />
          <b>{{__('exercise.descriptionField')}}:</b> {{ $data["exercise"]->getDescription() }}<br />
          <b>{{__('exercise.recommendationsField')}}:</b> {{ $data["exercise"]->getRecommendations() }}<br />
          <br />
          <form method="POST" action="{{ route('exercise.delete', ['id' => $data["exercise"]->getId()] ) }}">
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{__('exercise.remove')}}</button>
          </form>

          <br />
          @if($data['exercise']->getPathVideo())
          <video width="100%"controls>
            <source src="{{ URL::asset('storage/'. $data['exercise']->getPathVideo()) }}" type="video/mp4" >
              Your browser does not support the video tag.
            </source>
          </video>
          @endif
          @if($data['exercise']->getPathImage())
          <img width="100%" src="{{ URL::asset('storage/'. $data['exercise']->getPathImage()) }}">
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
