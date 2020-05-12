@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('util.message')
      <div class="card">
        <div class="card-header"><center> {{ __('user.payment') }} </center></div>
        <div class="card-body" align="center">
          @if($errors->any())
          <ul id="errors">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form method="POST" action="{{ route('user.pay') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden"  required="true" name="amount" value="{{$data['amount']}}">
            <input type="number" required="true" class="form-control" placeholder="{{ __('user.cardNumber') }}" name="card_number" value="{{ old('card_number') }}"/> <br />
            <input type="number" required="true" class="form-control" placeholder="{{ __('user.cvv') }}" name="cvv" value="{{ old('cvv') }}" /><br />
            <input type="number" required="true" class="form-control" placeholder="{{ __('user.expDate') }}" name="exp_date" value="{{ old('exp_date') }}" /> <br />
            <input type="text" required="true" class="form-control" placeholder="{{ __('user.owner') }}" name="owner" value="{{ old('owner') }}" /> <br />
            <input type="submit" class="btn btn-success col-md-8" value="{{ __('user.pay') }}"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
