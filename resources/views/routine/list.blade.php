@extends('layouts.master')
@section("title", $data["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" align="center">{{__('routine.listTitle')}}</div>
        <div class="card-body">
          <div class="row justify-content-center">
            <a href="{{ route('routine.create', ['trainingId' => $data['training_id'] ]) }}" class="btn btn-primary">{{__('routine.create')}}</a>
          </div>
          <br />
          <table  class="table table-striped">
            <!-- ADD HEADERS -->
            <thead>
              <tr>
                <th scope="col">{{__('routine.repetitionsField')}}</th>
                <th scope="col">{{__('routine.sequencesField')}}</th>
                <th scope="col">{{__('routine.secondsToRestField')}}</th>
                <th scope="col">{{__('routine.exerciseName')}}</th>
                <th scope="col">{{__('routine.update')}}</th>
                <th scope="col">{{__('routine.delete')}}</th>
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
                  <a class="btn btn-primary" href="{{ route('routine.update', ['id' => $routine->getId()])}}">{{__('routine.update')}}</a>
                </td>
                <td>
                  <form method="POST" action="{{ route('routine.delete', ['id' => $routine->getId()] ) }}">
                    @csrf
                    <div class="row justify-content-center">
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </div>
                  </form>
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
@endsection
