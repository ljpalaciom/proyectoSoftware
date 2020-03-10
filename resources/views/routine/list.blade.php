@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{__('routine.listTitle')}}</div>
        <div class="card-body">
          <div class="row p-5">
            <div class="col-md-12">
              <table  class="table table table-striped table-bordered">
                <!-- ADD HEADERS -->
                <thead>
                  <tr>
                    <th scope="col">{{__('record.repetitionsField')}}</th>
                    <th scope="col">{{__('record.sequencesField')}}</th>
                    <th scope="col">{{__('record.secondsToRestField')}}</th>
                    <th scope="col">{{__('record.exerciseName')}}</th>
                  </tr>
                </thead>
                <!-- BIND ARRAY TO TABLE -->
                <tbody>
                  @foreach($data["records"] as $record)
                  <tr>
                    <td> {{ $record->getName() }}</td>
                    <td> {{ $record->getSequences() }}</td>
                    <td> {{ $record->getSecondsToRest() }}</td>
                    <td> {{ $record->exercise->getName() }}</td>
                    <!-- <td><a href="{{ route('record.show', ['id' => $record->getId()] ) }}"> {{__('record.show')}} </a></td> -->
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
