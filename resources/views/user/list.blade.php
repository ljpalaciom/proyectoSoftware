@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div align="left">
    <a type="button" class="btn btn-outline-dark" href="{{ route('user.listByName')}}" >{{ __('user.orderByName') }}</a>
    <a type="button" class="btn btn-outline-dark" href="{{ route('user.list')}}">{{ __('user.orderById') }}</a>
  </div>
  <br />
  <h1 align="center">{{ __('user.list') }}</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">{{ __('user.id') }}</th>
        <th scope="col">{{ __('user.name') }}</th>
        <th scope="col">{{ __('user.email') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data["users"] as $user)
      <tr>
        <th scope="row">
          @if($loop->index < 2)
          <a class="navbar-brand" href="{{ route('user.show', $user->getId() ) }}" style="color:black">
            <b>{{ $user->getId() }}</b>
          </a>
          @else
          <a class="navbar-brand" href="{{ route('user.show', $user->getId() ) }}" style="color:blue">
            {{ $user->getId() }}
          </a>
          @endif
        </th>
        <td> {{ $user->getName() }} </td>
        <td> {{ $user->getEmail() }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
