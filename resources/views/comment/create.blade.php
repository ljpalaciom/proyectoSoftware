@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header">{{__('comment.createTitle')}}</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <b>{{__('exercise.nameField')}}:</b> {{ $data["exercise"]->getName() }}<br /> <br>
          <b>{{__('exercise.descriptionField')}}:</b> {{ $data["exercise"]->getDescription() }}<br /> <br>
          <b>{{__('exercise.recommendationsField')}}:</b> {{ $data["exercise"]->getRecommendations() }}<br /> <br>

          <form method="POST" action="{{ route('comment.save') }}">
            @csrf
            <input name="exercise_id" type="hidden" value="{{$data['exercise']->getId()}}">
            <div class="form-group">
              <textarea class="form-control" placeholder="{{__('comment.commentField')}}" name="comment" value="{{ old('comment') }}"></textarea>
            </div>

            <div class="row justify-content-center">
              <input type="submit" class="btn btn-primary" value="{{__('comment.create')}}" />
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
