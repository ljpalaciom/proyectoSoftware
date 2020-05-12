@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header" align="center">{{ $data["exercise"]->getName() }}</div>
        <div class="card-body">
          <b>{{__('exercise.nameField')}}:</b> {{ $data["exercise"]->getName() }}<br />
          <b>{{__('exercise.descriptionField')}}:</b> {{ $data["exercise"]->getDescription() }}<br />
          <b>{{__('exercise.recommendationsField')}}:</b> {{ $data["exercise"]->getRecommendations() }}<br />
          <br />
          @if($data['exercise']->getPathVideo())
          <video width="100%"controls>
            <source src="{{ URL::asset('storage/'. $data['exercise']->getPathVideo()) }}" type="video/mp4" >
              Your browser does not support the video tag.
            </source>
          </video><br /><br />
          @endif
          @if($data['exercise']->getPathImage())
          <img width="100%" src="{{ URL::asset('storage/'. $data['exercise']->getPathImage()) }}"> <br /><br />
          @endif
          <div class="row justify-content-center">
            <a class="btn btn-primary col-md-2 mr-4" href="{{ route('exercise.update', ['id' => $data["exercise"]->getId()])}}">{{__('exercise.update')}}</a>
            <form method="POST" action="{{ route('exercise.delete', ['id' => $data["exercise"]->getId()] ) }}">
              @csrf
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
