@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $data["user"]->getName() }}</div>
        <div class="card-body">
          <b>{{ __('user.name') }}:</b> {{ $data["user"]->getName() }}<br />
          <b>{{ __('user.lastName') }}:</b> {{ $data["user"]->getLastName() }}<br />
          <b>{{ __('user.age') }}:</b> {{ $data["user"]->getAge() }}<br />
          <b>{{ __('user.email') }}:</b> {{ $data["user"]->getEmail() }}<br />
        </div>
        <div align="center">
          <a type="button" class="btn btn-outline-dark" href="{{ route('user.list')}}" style="right:50%;" >{{ __('user.back') }}</a>
        </div>
        <br />
        @csrf
        <a type="button" class="btn btn-danger" href="{{ route('user.delete', $data['user']->getId()) }}">{{ __('user.delete') }}</a>
      </div>
    </div>
  </div>
</div>
@endsection
