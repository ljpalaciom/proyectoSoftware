@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" >
        <div class="card-header" align="center">{{ $data["user"]->getName() }}</div>
        <div class="card-body">
          <b>{{ __('user.name') }}:</b> {{ $data["user"]->getName() }}<br />
          <b>{{ __('user.lastName') }}:</b> {{ $data["user"]->getLastName() }}<br />
          <b>{{ __('user.age') }}:</b> {{ $data["user"]->getAge() }}<br />
          <b>{{ __('user.email') }}:</b> {{ $data["user"]->getEmail() }}<br />
        </div>
        <br />
        <div class="row justify-content-center">
        <a class="btn btn-primary col-md-2 mr-4" href="{{ route('user.update', ['id' => $data['user']->getId()])}}">{{__('user.update')}}</a>
        <form method="POST" action="{{ route('user.deleteAdmin', $data['user']->getId()) }}">
          @csrf
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button><br />
        </form>
        </div>
        <br />
      </div>
    </div>
  </div>
</div>
@endsection
