@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div align="left">
    <a type="button" class="btn btn-outline-dark" href="{{ route('user.listByName')}}" >Order by name</a>
    <a type="button" class="btn btn-outline-dark" href="{{ route('user.list')}}" >Order by id</a>
  </div>
  <br />
  <h1 align="center">List of users</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
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
