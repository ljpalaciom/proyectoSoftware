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
              <br />
              <table  class="table table table-striped table-bordered">
                <!-- ADD HEADERS -->
                <thead>
                  <tr>
                    <th scope="col">{{__('routine.repetitionsField')}}</th>
                    <th scope="col">{{__('routine.sequencesField')}}</th>
                    <th scope="col">{{__('routine.secondsToRestField')}}</th>
                    <th scope="col">{{__('routine.exerciseName')}}</th>
                    <th scope="col">{{__('routine.action')}}</th>
                  </tr>
                </thead>
                <!-- BIND ARRAY TO TABLE -->
                <tbody>
                  @foreach($data["routines"] as $routine)
                  <tr>
                    <td> {{ $routine->getRepetitions() }}</td>
                    <td> {{ $routine->getSequences() }}</td>
                    <td> {{ $routine->getSecondsToRest() }}</td>
                    <td> {{ $routine->name }}</td>
                    <td>
                        <a href="{{ route('routine.retrieve', ['id' => $routine->getId() ]) }}" class="btn btn-primary">{{__('routine.retrieveTitle')}}</a>
                    </td>
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
