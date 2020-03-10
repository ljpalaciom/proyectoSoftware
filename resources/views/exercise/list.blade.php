@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="row p-5">
      <div class="col-md-12">
        <ul id="errors">
          <h1 align="center"> {{__('exercise.titleList')}}</h1>
          <div class="row py-4 justify-content-center">
            <div class="col-md-8 offset-md-3">
              <a class="btn btn-success" href="{{ route('exercise.create')}}">{{__('exercise.create')}}</a>
              <a class="btn btn-primary" href="{{ route('exercise.list')}}">{{__('exercise.listById')}}</a>
              <a class="btn btn-primary" href="{{ route('exercise.listByDescription')}}"></i>{{__('exercise.listByDescription')}}</a>
            </div>
          </div>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">{{__('exercise.nameField')}}</th>
                <th scope="col">{{__('exercise.descriptionField')}}</th>
                <th scope="col">{{__('exercise.recommendationsField')}}</th>
                <th scope="col">{{__('exercise.createdAtField')}}</th>
              </tr>
            </thead>  <tbody>
              @foreach($data["exercises"] as $exercise)
              <tr>
                @if ($loop->index < 2)
                <th>{{$exercise->getId()}}</th>
                @else
                <td>{{$exercise->getId()}}</td>
                @endif
                <td>{{$exercise->getName()}}</td>
                <td>{{$exercise->getDescription()}}</td>
                <td>{{$exercise->getRecommendations()}}</td>
                <td>{{$exercise->getCreatedAt()}}</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
