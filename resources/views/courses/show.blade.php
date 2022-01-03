@extends('layouts.template')

@section('title','Courses')

@section('main')
    <h1>{{$courses->name}}</h1>
    <p>{{$courses->description}}</p>

    <p>List of students enrolled</p>
    @if($studentCourses->count()==0)
        <div class="alert alert-danger alert-dismissible fade show">
            No students enrolled!
        </div>
    @endif

    @foreach($studentCourses as $studentCourse)
        <li>{{$studentCourse->student->first_name}} {{$studentCourse->student->last_name}} (semester {{$studentCourse->semester}})</li>
    @endforeach

@endsection
