@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header">{{__('record.createTitle')}}</div>
        <div class="card-body">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <form method="POST" action="{{ route('record.save', $data["userId"]) }}">
            @csrf
            <input type="text"  class="form-control" placeholder="{{__('record.weightField')}}" name="weight" value="{{ old('weight') }}" />
            <br />
            <input type="text"  class="form-control" placeholder="{{__('record.heightField')}}" name="height" value="{{ old('height') }}" />
            <br />
            <input type="text"  class="form-control" placeholder="{{__('record.imcField')}}" name="imc" value="{{ old('imc') }}" />
            <br />
            <br />
            <input type="submit" class="btn btn-primary form-control" value="{{__('record.create')}}" />
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
