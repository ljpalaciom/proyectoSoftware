@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header" align="center">{{__('appointment.updateApointment')}}</div>
        <div class="card-body" align="center">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('appointment.saveUpdate') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $data['appointment']->getId() }}" />
              <input type="date" class="form-control"  name="date" value="{{ old('date') }}"/> <br/>
              <input type="time" class="form-control"  name="time" value="{{ old('time') }}" /> <br/>
              <input class="form-control" placeholder="{{__('appointment.insertDescription')}}" name="description" value="{{ old('description') }}" /> <br />
              <input type="submit" class="btn btn-primary col-md-8" value="{{__('appointment.update')}}"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
