@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> <center>{{ __('user.welcome') }} {{ Auth::user()->name }}</center></div>
        <div class="card-body">
          <center>{{ __('user.covid') }}</center>
          <center>{{ __('user.confirmed') }}:{{$data["covid"]["response"]->Confirmed}} </center>
          <center>{{ __('user.deaths') }}:{{$data["covid"]["response"]->Deaths}} </center>
          <center>{{ __('user.recovered') }}:{{$data["covid"]["response"]->Recovered}} </center>
        </div>
      </div>
    </div>
  </div>

  <br />
  <h5>{{ __('user.sponsored') }}</h3>
  <br/>
  <div class="row">
    @foreach($data["watches"]["items"] as $item)
    <div class="col-md-4">
       <div class="card mb-4 border-dark">
          <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
          <div class="card-body">
             <h5 class="card-title">{{ $item->name }}</h5>
             <p class="card-text">{{ $item->description }}</p>
             <a href="{{ route('user.payWatch', $item->price) }}" class="btn btn-dark btn-sm">{{ __('user.buy') }}</a>
          </div>
       </div>
    </div>
    @endforeach
 </div>
</div>

@endsection
