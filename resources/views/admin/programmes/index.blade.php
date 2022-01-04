@extends('layouts.template')

@section('title','Programmes')

@section('main')
    <h1>Programmes</h1>
    <p>
        <a href="/admin/programmes/create" class="btn btn-outline-success">
            <i class="fas fa-plus-circle mr-1"></i>Create new programme
        </a>
    </p>

    @foreach($programmes as $programme)
        <a href="/admin/programmes/{{$programme->id}}/show">
            <div class="card">
                <div class="card-body text-primary">
                    <form action="/admin/programmes/{{ $programme->id }}" method="post">
                    {{$programme->name}}
                    @csrf
                    @method('delete')
                    <div class="btn-group btn-group-sm float-right">
                        <a href="/admin/programmes/{{ $programme->id }}/edit" class="btn btn-outline-success"
                           data-toggle="tooltip"
                           title="Edit {{ $programme->name }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-outline-danger deleteProgramme"
                                data-toggle="tooltip"
                                data-records="{{$programme->records_count}}"
                                title="Delete {{ $programme->name }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </a>




    @endforeach
@endsection
@section('script_after')
    <script>
        $('.deleteProgramme').click(function () {
            const records = $(this).data('records');
            let msg = `Delete this Programme?`;
            if (records > 0) {
                msg += `\nThe ${records} records of this programme will also be deleted!`
            }
            if (confirm(msg)) {
                $(this).closest('form').submit();
            }
        })
    </script>
@endsection
