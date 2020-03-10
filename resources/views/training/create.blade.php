@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header">{{__('training.createTitle')}}</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('training.save', $data["user_id"]) }}">
            @csrf
            <input type="text" class="form-control" placeholder="{{__('training.nameField')}}" name="name" value="{{ old('name') }}" />
            <br />
            <input type="text"  class="form-control" placeholder="{{__('training.dayField')}}" name="day" value="{{ old('day') }}" />
            <br />
            <input type="text"  class="form-control" placeholder="{{__('training.durationField')}}" name="duration" value="{{ old('duration') }}" />
            <br />
            <br />
            <input type="submit" class="btn btn-primary form-control" value="{{__('training.create')}}" />
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
