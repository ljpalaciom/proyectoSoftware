@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
      <div class="col-md-14">
        <ul id="errors">
          <h1 align="center"> {{__('exercise.titleList')}}</h1>
              <a class="btn btn-outline-dark" href="{{ route('exercise.list')}}">{{__('exercise.listById')}}</a>
              <a class="btn btn-outline-dark" href="{{ route('exercise.listByDescription')}}"></i>{{__('exercise.listByDescription')}}</a>
              <a class="btn btn-success" href="{{ route('exercise.create')}}">{{__('exercise.create')}}</a>
            <br /> <br />
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">{{__('exercise.name')}}</th>
                <th scope="col">{{__('exercise.description')}}</th>
                <th scope="col">{{__('exercise.recommendations')}}</th>
                <th scope="col">{{__('exercise.createdAtField')}}</th>
                <th scope="col">{{__('exercise.action')}}</th>
              </tr>
            </thead>  <tbody>
              @foreach($data["exercises"] as $exercise)
              <tr>
                <td>{{$exercise->getId()}}</td>
                <td>{{$exercise->getName()}}</td>
                <td>{{$exercise->getDescription()}}</td>
                <td>{{$exercise->getRecommendations()}}</td>
                <td>{{$exercise->getCreatedAt()}}</td>
                <td>
                <a class="btn btn-outline-dark" href="{{ route('exercise.retrieve', $exercise->getId())}}"></i>{{__('exercise.inspect')}}</a>
                <td/>
              </tr>
              @endforeach
            </tbody>
          </table>
        </ul>
      </div>
</div>
@endsection
