@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header" align="center">{{__('exercise.updateExercise')}}: {{ $data['exercise']->getName() }}</div>
        <div class="card-body" align="center">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('exercise.saveUpdate') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $data['exercise']->getId() }}" />
            <input type="text" class="form-control" placeholder="{{__('exercise.nameField')}}" name="name" value="{{ old('name') }}" /> <br />
            <input type="text" class="form-control" placeholder="{{__('exercise.descriptionField')}}" name="description" value="{{ old('description') }}" /> <br />
            <input type="text" class="form-control" placeholder="{{__('exercise.recommendationsField')}}" name="recommendations" value="{{ old('recommendations') }}" /> <br />
            <input type="text" class="form-control" placeholder="{{__('exercise.videoField')}}" name="path_video" value="{{ old('path_video') }}" /> <br />
            <input type="text" class="form-control" placeholder="{{__('exercise.imageField')}}" name="path_image" value="{{ old('path_image') }}" /> <br />
            <input type="submit" class="btn btn-primary col-md-8" value="{{__('exercise.update')}}" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
