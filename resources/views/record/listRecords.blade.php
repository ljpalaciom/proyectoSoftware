@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{$data["title"]}}</div>
        <div class="card-body">
          <div class="row p-5">
            <div class="col-md-12">

              <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Sort By
                </button>

                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('record.sort', 'id' ) }}">Id</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'name' ) }}">Name</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'weight' ) }}">Weight</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'height' ) }}">Height</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'imc' ) }}">IMC</a>
                  <a class="dropdown-item" href="{{route('record.sort', 'created_at' ) }}">Date</a>
                </div>
              </div>
              <br />
              <table  class="table table table-striped table-bordered">
                <!-- ADD HEADERS -->
                <thead>
                  <tr>
                    <th scope="col"> Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                  </tr>
                </thead>
                <!-- BIND ARRAY TO TABLE -->
                <tbody>
                  @foreach($data["records"] as $record)
                  <tr>
                    @if($loop->index < 2) <td><b>{{ $record->getId() }}</b></td>
                    @else <td>{{ $record->getId() }}</td>
                    @endif
                    <td> {{ $record->getName() }}</td>
                    <td><a href="{{ route('record.show', ['id' => $record->getId()] ) }}"> Show </a></td>
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
