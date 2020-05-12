@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card" align="center">
        <div class="card-header"> <center>{{ __('user.welcome') }} {{ Auth::user()->name }}</center></div>
        <div class="card-body">
          <h4><strong>{{ __('user.covid') }}</strong></h4>
          <strong>{{ __('user.confirmed') }}:</strong> {{$data["covid"]["response"]->Confirmed}}  <br />
          <strong>{{ __('user.deaths') }}:</strong> {{$data["covid"]["response"]->Deaths}}  <br />
          <strong>{{ __('user.recovered') }}:</strong> {{$data["covid"]["response"]->Recovered}}  <br />
        </div>
      </div>
    </div> <br />
    <h3><br />- {{ __('user.sponsored') }} -<br /></h3>
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
</div>

@endsection
