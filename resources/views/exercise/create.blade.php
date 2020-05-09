@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header">{{__('exercise.create')}}</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('exercise.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" placeholder="{{__('exercise.nameField')}}" name="name" value="{{ old('name') }}" />
            </div>
            <div class="form-group">
              <textarea   class="form-control" placeholder="{{__('exercise.descriptionField')}}" name="description" value="{{ old('description') }}"></textarea>
            </div>
            <div class="form-group">
              <textarea class="form-control" placeholder="{{__('exercise.recommendationsField')}}" name="recommendations" value="{{ old('recommendations') }}" ></textarea>
            </div>
            <div class="form-group">
              <input accept=".avi,.mp4" type="file" class="form-control-file" placeholder="{{__('exercise.videoField')}}" name="video" value="{{ old('video') }}" />
            </div>
            <div class="form-group">
              <input accept=".png,.jpg,.jpeg" type="file" class="form-control-file" placeholder="{{__('exercise.imageField')}}" name="image" value="{{ old('image') }}" />
            </div>
            <div class="row justify-content-center">
              <input type="submit" class="btn btn-primary" value="{{__('exercise.create')}}" />
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
