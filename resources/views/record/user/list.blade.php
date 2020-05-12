@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12" align="center">
      <h1 >{{__('record.listTitle')}}</h1>
      <div class="col-md-12 mx-auto">
        {!! $chart->container() !!}
      </div>
      <br />
      <h3> {{ __('record.data') }}</h3>
      <table class="table table-striped">
        <!-- ADD HEADERS -->
        <thead>
          <tr>
            <th scope="col">{{__('record.weight')}}</th>
            <th scope="col">{{__('record.height')}}</th>
            <th scope="col">{{__('record.imc')}}</th>
            <th scope="col">{{__('record.date')}}</th>
          </tr>
        </thead>
        <!-- BIND ARRAY TO TABLE -->
        <tbody>
          @foreach($data["records"] as $record)
          <tr>
            <td> {{ $record->getWeight() }}</td>
            <td> {{ $record->getHeight() }}</td>
            <td> {{ $record->getIMC() }}</td>
            <td> {{ $record->getCreatedAt() }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('record.export') }}">{{__('record.excel')}}&nbsp;&nbsp;</a>
      <a href="{{ route('record.exportPDF') }}">{{__('record.pdf')}}</a>
      <br/>

    </div>
  </div>
</div>
@endsection
