@extends('layouts.template')

@section('title','Programmes')

@section('main')
    <h1>{{$programmes->name}}</h1>

    <p>Courses:</p>

    @if($programmes->courses->count()==0)
        <div class="alert alert-danger alert-dismissible fade show">
            No courses for this programme!
        </div>
    @endif
    @foreach($programmes->courses as $course)
        <li>{{$course->name}}</li>
    @endforeach

@endsection
