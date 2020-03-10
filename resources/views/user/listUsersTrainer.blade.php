@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
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
          <a class="navbar-brand" href="{{ route('user.showTrainer', $user->getId() ) }}" style="color:black">
            <b>{{ $user->getId() }}</b>
          </a>
        </th>
        <td> {{ $user->getName() }} </td>
        <td> {{ $user->getEmail() }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
