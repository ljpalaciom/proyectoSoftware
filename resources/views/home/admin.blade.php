@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"> <center>Welcome {{ Auth::user()->name }}</center></div>
        <div class="card-body">
          <a type="button" class="btn btn-primary btn-lg btn-block" href="{{ route('user.create') }}">Create</a>
          <a type="button" class="btn btn-secondary btn-lg btn-block" href="{{ route('user.list') }}">List</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
