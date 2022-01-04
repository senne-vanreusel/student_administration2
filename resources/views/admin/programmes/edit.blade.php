@extends('layouts.template')

@section('title','Programmes')

@section('main')
    <h1>Edit programme: {{$programme->name}}</h1>
    <form action="/admin/programmes/{{$programme->id}}" method="post">
        @method('put')
        @include("admin.programmes.form")
    </form>

@endsection
