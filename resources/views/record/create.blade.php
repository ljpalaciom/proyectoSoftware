@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @include('util.message')
            <div class="card">
                <div class="card-header">Create record</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('record.save') }}">
                    @csrf
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                    <br />
                    <input type="text"  class="form-control" placeholder="Enter weight" name="weight" value="{{ old('weight') }}" />
                    <br />
                    <input type="text"  class="form-control" placeholder="Enter height" name="height" value="{{ old('height') }}" />
                    <br />
                    <input type="text"  class="form-control" placeholder="Enter IMC" name="imc" value="{{ old('imc') }}" />
                    <br />
                    <br />
                    <input type="submit" class="btn btn-primary form-control" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
