@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $data["user"]["name"] }}</div>
        <div class="card-body">
          <b>User name:</b> {{ $data["user"]["name"] }}<br />
          <b>User last name:</b> {{ $data["user"]["lastName"] }}<br />
          <b>User age:</b> {{ $data["user"]["age"] }}<br />
          <b>User email:</b> {{ $data["user"]["email"] }}<br />
        </div>
        <div align="center">
          <a type="button" class="btn btn-outline-dark" href="{{ route('user.list')}}" style="width: 60px; height: 40px; right: :50%;" >Back</a> 
        </div>
        <br />
        <a type="button" class="btn btn-danger" href="{{ route('user.delete', $data["user"]["id"]) }}">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection
