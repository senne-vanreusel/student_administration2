@extends('layouts.template')

@section('title','Courses')

@section('main')
    <h1>Course</h1>
    <p>You selected the course with id: {{ $id }}</p>
    <p>List of students enrolled</p>
@endsection
