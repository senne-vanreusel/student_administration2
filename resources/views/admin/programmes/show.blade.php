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
    <br>
    <h2>Add a new course to IT Factory</h2>
    <form action="/admin/programmes/{{$programmes->id}}/add" method="get">
        @csrf
        <div class="form-group">
            <input type="text" name="id" id="id"
                   disabled
                   hidden
                   value="{{$programmes->id}}">
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                   class="form-control @error('name>') is-invalid @enderror"
                   placeholder="Name"
                   minlength="3"
                   required
                   value="">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="description">Description</label>
            <input type="text" name="description" id="description"
                   class="form-control @error('description') is-invalid @enderror"
                   placeholder="Description"
                   minlength="3"
                   required
                   value="">
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Add course</button>
    </form>



@endsection
