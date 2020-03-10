@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{__('record.listTitle')}}</div>
        <div class="col-md-12 mx-auto">
          {!! $chart->container() !!}
        </div>
        <div class="card-body">
          <div class="row p-5">
            <div class="col-md-12">
              <a href="{{ route('record.export') }}">{{__('record.excel')}}&nbsp;&nbsp;</a>
              <a href="{{ route('record.exportPDF') }}">{{__('record.pdf')}}</a>
              <br />
              <table  class="table table table-striped table-bordered">
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
              <br/>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
