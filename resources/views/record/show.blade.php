@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $data["title"]}}</div>
        <div class="card-body">
          <b>{{__('record.id')}}:</b> {{ $data["record"]->getId() }}<br />
          <b>{{__('record.name')}}:</b> {{ $data["record"]->getName() }}<br />
          <b>{{__('record.weight')}}:</b> {{ $data["record"]->getWeight() }}<br />
          <b>{{__('record.height')}}:</b> {{ $data["record"]->getHeight() }}<br />
          <b>{{__('record.imc')}}:</b> {{ $data["record"]->getIMC() }}<br />
          <b>{{__('record.createdAt')}}:</b> {{ $data["record"]->getCreatedAt() }}<br />
          <br />
          <a href="{{ route('record.delete', ['id' => $data["record"]->getId()]) }}" class="btn btn-xs btn-danger pull-right form-control">{{__('record.delete')}}</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
