@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('exercise.exercise')}}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('exercise.create') }}" role="button">{{__('exercise.create')}}</a>
                    <a class="btn btn-primary" href="{{ route('exercise.list') }}" role="button">{{__('exercise.list')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
