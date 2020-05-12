@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" align="center">
        <div class="card-header">{{__('layout.welcome')}} {{ Auth::user()->name }}</div>
        <div class="card-body">
          <div>
            {{__('layout.trainer')}}
          </div>
          <br />
          <img src="https://isualumblog.files.wordpress.com/2015/09/coaching-clipart-images3.jpg" alt="Italian Trulli">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
