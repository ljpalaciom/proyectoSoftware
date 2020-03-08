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

          <form method="POST" action="{{ route('comment.save') }}">
            @csrf
            <input name="exercise_id" type="hidden" value={{exercise_id}}>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="{{__('comment.commentField')}}" name="comment" value="{{ old('comment') }}" />
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
