@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header"><center>Create user</center></div>
        <div class="card-body" align="center">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('user.save') }}">
            @csrf
            <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}"/> <br />
            <input type="text" class="form-control" placeholder="Enter last name" name="lastName" value="{{ old('lastName') }}" /><br />
            <input type="number" class="form-control" placeholder="Enter age" name="age" value="{{ old('age') }}" /> <br />
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}" /> <br />
            <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{ old('password') }}" /> <br />
            <input type="submit" class="btn btn-secondary" value="Send"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
