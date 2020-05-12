@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card" align="center">
        <div class="card-header" > {{ __('appointment.createAppointment') }}</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('appointment.save', $data['userId']) }}">
            @csrf
            <input type="date" class="form-control"  name="date" value="{{ old('date') }}"/> <br />
            <input type="time" class="form-control"  name="time" value="{{ old('time') }}"/> <br />
            <textarea class="form-control" placeholder="{{__('appointment.insertDescription')}}" name="description">{{ old('description') }}</textarea>
          <br />
          <input type="hidden" class="form-control" name="trainer_id" value="{{Auth::user()->getId()}}"/>
          <input type="submit" class="btn btn-success col-md-8" value="{{ __('appointment.create') }}"/>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
