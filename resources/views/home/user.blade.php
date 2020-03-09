@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> <center>Welcome {{ Auth::user()->name }}</center></div>
        <div class="card-body">
          <center>User</center>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
