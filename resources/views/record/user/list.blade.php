@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{__('record.listTitle')}}</div>
        <div class="card-body">
          <div class="row p-5">
            <div class="col-md-12">

              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  {{__('record.sortBy')}}
                </button>

                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('record.sort', 'id' ) }}">{{__('record.id')}}</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'weight' ) }}">{{__('record.weight')}}</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'height' ) }}">{{__('record.height')}}</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'imc' ) }}">{{__('record.imc')}}</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'created_at' ) }}">{{__('record.date')}}</a>
                </div>
              </div>
              <br />
              <table  class="table table table-striped table-bordered">
                <!-- ADD HEADERS -->
                <thead>
                  <tr>
                    <th scope="col">{{__('record.id')}}</th>
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
                    @if($loop->index < 2) <td><b>{{ $record->getId() }}</b></td>
                    @else <td>{{ $record->getId() }}</td>
                    @endif
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
