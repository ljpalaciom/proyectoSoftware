@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["title"]}}</div>

                <div class="card-body">
                    <b>Id:</b> {{ $data["record"]->getId() }}<br />
                    <b>Name:</b> {{ $data["record"]->getName() }}<br />
                    <b>Weight:</b> {{ $data["record"]->getWeight() }}<br />
                    <b>Height:</b> {{ $data["record"]->getHeight() }}<br />
                    <b>IMC:</b> {{ $data["record"]->getIMC() }}<br />
                    <b>Created at:</b> {{ $data["record"]->getCreatedAt() }}<br />
                    <br />
                    <a href="{{ route('record.delete', ['id' => $data["record"]->getId()]) }}" class="btn btn-xs btn-danger pull-right form-control">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
