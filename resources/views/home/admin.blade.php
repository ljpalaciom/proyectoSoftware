@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" align="center">
        <div class="card-header">{{__('layout.welcome')}} {{ Auth::user()->name }}</div>
        <div class="card-body">
          <div>
            {{__('layout.admin')}}
          </div>
          <img src="https://img.icons8.com/bubbles/2x/admin-settings-male.png" alt="Italian Trulli">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
