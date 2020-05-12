@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div align="left">
    <a type="button" class="btn btn-success" href="{{ route('user.createAdmin')}}">{{ __('user.create') }}</a>
  </div>
  <br />
  <h1 align="center">{{ __('user.trainersList') }}</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">{{ __('user.id') }}</th>
        <th scope="col">{{ __('user.name') }}</th>
        <th scope="col">{{ __('user.email') }}</th>
        <th scope="col">{{__('exercise.action')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data["users"] as $user)
      <tr>
        <td> {{ $user->getId() }} </td>
        <td> {{ $user->getName() }} </td>
        <td> {{ $user->getEmail() }} </td>
        <td>
          <a class="btn btn-outline-dark" href="{{ route('user.showAdmin', $user->getId() ) }}"></i>{{__('exercise.inspect')}}</a>
          <td/>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
