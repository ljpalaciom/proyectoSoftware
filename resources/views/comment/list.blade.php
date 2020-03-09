@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="row p-5">
      <div class="col-md-12">
        <ul id="errors">
          <h1 align="center"> {{__('comment.listTitle')}}</h1>
          <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              {{__('comment.sortBy')}}
            </button>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('comment.sort', 'id' ) }}">Id</a>
              <a class="dropdown-item" href="{{route('comment.sort', 'Exercises.name' ) }}">{{__('comment.exerciseName')}}</a>
              <a class="dropdown-item" href="{{route('comment.sort', 'comment' ) }}">{{__('comment.comment')}}</a>
              <a class="dropdown-item" href="{{route('comment.sort', 'created_at' ) }}">{{__('comment.createdAtField')}}</a>
            </div>
          </div>
          <br />
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">{{__('comment.userName')}}</th>
                <th scope="col">{{__('comment.exerciseName')}}</th>
                <th scope="col">{{__('comment.comment')}}</th>
                <th scope="col">{{__('comment.createdAtField')}}</th>
                <th scope="col">{{__('comment.remove')}}</th>
              </tr>
            </thead>  <tbody>
              @foreach($data["comments"] as $comment)
              <tr>
                <td>{{$comment->getId()}}</td>
                <td>{{$comment->user->getName()}}</td>
                <td>{{$comment->exercise->getName()}}</td>
                <td>{{$comment->getComment()}}</td>
                <td>{{$comment->getCreatedAt()}}</td>
                <td>
                  <form method="POST" action="{{ route('comment.delete', ['id' => $comment->getId()] ) }}">
                    @csrf
                    <div class="row justify-content-center">
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{__('comment.removeButton')}}</button>
                    </div>
                  </form>
                </td>
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
