@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card" align="center">
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
            <input type="text" class="form-control" placeholder="{{__('exercise.nameField')}}" name="name" value="{{ old('name') }}" /> <br />
            <textarea   class="form-control" placeholder="{{__('exercise.descriptionField')}}" name="description">{{ old('description') }}</textarea> <br />
            <textarea class="form-control" placeholder="{{__('exercise.recommendationsField')}}" name="recommendations">{{ old('recommendations') }}</textarea> <br />

            <div class="input-group">
              <div class="custom-file">
                <input accept=".avi,.mp4" type="file" class="custom-file-input" name="video" value="{{ old('video') }}" aria-describedby="inputGroupFileAddon01" id="inputGroupFile01"> <br />
                <label class="custom-file-label" for="inputGroupFile01">{{__('exercise.videoField')}}</label>
              </div>
            </div>
            <br />
            <div class="input-group">
              <div class="custom-file">
                <input accept=".png,.jpg,.jpeg" id="inputGroupFile02" type="file" class="custom-file-input" name="image" value="{{ old('image') }}" aria-describedby="inputGroupFileAddon02"/> <br />
                <label class="custom-file-label" for="inputGroupFile02">{{__('exercise.imageField')}}</label>
              </div>
            </div>
  <br />
            <input type="submit" class="btn btn-success col-md-8" value="{{__('exercise.create')}}" /> <br />
          </form>



        </div>
      </div>
    </div>
  </div>
  @endsection
