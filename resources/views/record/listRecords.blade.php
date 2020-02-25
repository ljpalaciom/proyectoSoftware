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
                        <ul id="errors">
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
                        <br/>
                            @foreach($data["records"] as $record)
                                @if($loop->index < 2) <b>{{ $record->getId() }}</b>
                                @else {{ $record->getId() }}
                                @endif
                                 - {{ $record->getName() }}
                                <a href="{{ route('record.show', ['id' => $record->getId()] ) }}"> Show </a>
                                <br/>
                                <br/>
                            @endforeach
                        </ul>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
