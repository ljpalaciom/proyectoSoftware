@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header" align="center">{{__('record.updateRecord')}}</div>
        <div class="card-body" align="center">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('record.saveUpdate') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $data['record']->getId() }}" />
            <input type="text"  class="form-control" placeholder="{{__('record.weightField')}}" name="weight" value="{{ old('weight') }}" /> <br />
            <input type="text"  class="form-control" placeholder="{{__('record.heightField')}}" name="height" value="{{ old('height') }}" /> <br />
            <input type="text"  class="form-control" placeholder="{{__('record.imcField')}}" name="imc" value="{{ old('imc') }}" /> <br />
            <input type="submit" class="btn btn-primary  col-md-8" value="{{__('exercise.update')}}" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
