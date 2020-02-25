@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["title"]}}</div>

                <div class="card-body">
                    <b>Id:</b> {{ $data["record"]["id"] }}<br />
                    <b>Name:</b> {{ $data["record"]["name"] }}<br />
                    <b>Weight:</b> {{ $data["record"]["weight"] }}<br />
                    <b>Height:</b> {{ $data["record"]["height"] }}<br />
                    <b>IMC:</b> {{ $data["record"]["imc"] }}<br />
                    <b>Created at:</b> {{ $data["record"]["created_at"] }}<br />
                    <br />
                    <a href="{{ route('record.delete', ['id' => $data["record"]["id"]]) }}" class="btn btn-xs btn-danger pull-right form-control">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
