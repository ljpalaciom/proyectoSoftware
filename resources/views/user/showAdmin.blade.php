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
        <br />
        <form method="POST" action="{{ route('user.deleteAdmin', $data['user']->getId(), $data['user']->getRole()) }}">
          @csrf
          <div class="row justify-content-center">
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('user.delete') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
