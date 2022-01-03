@extends('layouts.template')

@section('title','Courses')

@section('main')
    <h1>Courses</h1>
    <p>We will search for courses here (filtered by programma)!</p>
    @include('courses.search')
    <div class="row">
        @foreach($courses as $course)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3 d-flex align-content-stretch">
                <div class="card flex-grow-1 d-flex">
                    <div class="card-body">
                        <h5 class="card-title">{{$course->name}}</h5>
                        <p class="card-text">{{$course->description}}</p>
                        <a href="">{{$course->programme->name}}</a>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="courses/{{$course->id}}" class="btn btn-info btn-sm btn-block">Manage students</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script_after')
    <script>
        $(function () {
            // Add shadow to card on hover
            $('.card').hover(function () {
                $(this).addClass('shadow');
            }, function () {
                $(this).removeClass('shadow');
            });
            // submit form when leaving text field 'artist'
            $('#course').blur(function () {
                $('#searchForm').submit();
            });
            // submit form when changing dropdown list 'genre_id'
            $('#programme_id').change(function () {
                $('#searchForm').submit();
            });
        })
    </script>
@endsection

