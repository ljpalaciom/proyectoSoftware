@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header"><center> {{ __('user.create') }} </center></div>
        <div class="card-body" align="center">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('user.saveAdmin') }}">
            @csrf
            <input type="text" class="form-control" placeholder="{{ __('user.enterName') }}" name="name" value="{{ old('name') }}"/> <br />
            <input type="text" class="form-control" placeholder="{{ __('user.enterLastName') }}" name="last_name" value="{{ old('last_name') }}" /><br />
            <input type="number" class="form-control" placeholder="{{ __('user.enterAge') }}" name="age" value="{{ old('age') }}" /> <br />
            <input type="email" class="form-control" placeholder="{{ __('user.enterEmail') }}" name="email" value="{{ old('email') }}" /> <br />
            <input type="password" class="form-control" placeholder="{{ __('user.enterPassword') }}" name="password" value="{{ old('password') }}" /> <br />
            <div class="input-group-prepend">
              <select class="custom-select" name="role">
                <option value="1" selected>{{ __('user.user') }}</option>
                <option value="2">{{ __('user.trainer') }}</option>
                <option value="3">{{ __('user.admin') }}</option>
              </select>
            </div>  <br />
            <input type="submit" class="btn btn-success" value="{{ __('user.send') }}"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
