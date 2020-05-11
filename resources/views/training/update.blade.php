@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header" align="center">{{__('training.updateTraining')}}</div>
        <div class="card-body" align="center">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('training.saveUpdate') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $data['training']->getId() }}" />
            <input type="text" class="form-control" placeholder="{{__('training.nameField')}}" name="name" value="{{ old('name') }}" /> <br />
            <input type="text"  class="form-control" placeholder="{{__('training.dayField')}}" name="day" value="{{ old('day') }}" /> <br />
            <input type="text"  class="form-control" placeholder="{{__('training.durationField')}}" name="duration" value="{{ old('duration') }}" /> <br />
            <br />
            <input type="submit" class="btn btn-primary  col-md-8" value="{{__('training.update')}}" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
