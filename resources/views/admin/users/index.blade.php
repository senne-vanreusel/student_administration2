@extends('layouts.template')

@section('title','users (advanced)')

@section('main')
    <h1>Users</h1>

    <form action="" method="get" id="seachForm">
        <div class="row">
            <div class="col-sm-6 mb-2">
                <label for="filter">Filter Name Or Email</label>
                <input type="text" class="form-control" name="filter" id="filter" placeholder="Filter Name Or Email"
                {{request()->filter="value=".request()->filter .""}}>
            </div>
            <div class="col-sm-4 mb-2">
                <label for="filterSelect">Sort By</label>
                <select name="filterSelect" id="filterSelect" class="form-control">
                    <option value="m1" {{request()->filterSelect == "m1" ? 'selected' :''}}>Name (A =>Z)</option>
                    <option value="m2" {{request()->filterSelect == "m2" ? 'selected' :''}}>Name (Z =>A)</option>
                    <option value="m3" {{request()->filterSelect == "m3" ? 'selected' :''}}>Email (A =>Z)</option>
                    <option value="m4" {{request()->filterSelect == "m4" ? 'selected' :''}}>Email (Z =>A)</option>
                    <option value="m5" {{request()->filterSelect == "m5" ? 'selected' :''}}>Not Active</option>
                    <option value="m6" {{request()->filterSelect == "m6" ? 'selected' :''}}>Admin</option>
                </select>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Active</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->active}}</td>
                    <td>{{$user->admin}}</td>
                    <td data-id="{{$user->id}}"
                        data-email="{{$user->email}}"
                        data-name="{{$user->name}}"
                        data-active="{{$user->active}}"
                        data-admin="{{$user->admin}}">
                        <div class="btn-group btn-group-sm">
                            <a href="#!" class="btn btn-outline-success btn-edit" title="edit" ta-toggle="tooltip">

                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#!" class="btn btn-outline-danger btn-delete" title="delete" ta-toggle="tooltip">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->withQueryString()->links() }}
    </div>

    @include('admin.users.modal')
@endsection
@section('script_after')
{{--    <script>--}}

{{--        loadTable();--}}
{{--        // Popup a dialog and delete user--}}
{{--        $('tbody').on('click', '.btn-delete', function () {--}}
{{--            // Get data attributes from td tag--}}
{{--            const id = $(this).closest('td').data('id');--}}
{{--            const name = $(this).closest('td').data('name');--}}
{{--            // Set some values for Noty--}}
{{--            let text = `<p>Delete the User <b>${name}</b>?</p>`;--}}
{{--            let type = 'error';--}}
{{--            let btnText = 'Delete User';--}}
{{--            let btnClass = 'btn-success';--}}

{{--            // Show Confirm Dialog--}}
{{--            let modal = new Noty({--}}
{{--                type: type,--}}
{{--                text: text,--}}
{{--                buttons: [--}}
{{--                    Noty.button(btnText, `btn ${btnClass}`, function () {--}}
{{--                        // Delete USer--}}
{{--                        deleteUser(id);--}}
{{--                        modal.close();--}}
{{--                    }),--}}
{{--                    Noty.button('Cancel', 'btn btn-secondary ml-2', function () {--}}
{{--                        modal.close();--}}
{{--                    })--}}
{{--                ]--}}
{{--            }).show();--}}
{{--        });--}}

{{--        // Show the Bootstrap modal to edit a user--}}
{{--        $('tbody').on('click', '.btn-edit', function () {--}}
{{--            // Get data attributes from td tag--}}
{{--            const id = $(this).closest('td').data('id');--}}
{{--            const email = $(this).closest('td').data('email');--}}
{{--            const name = $(this).closest('td').data('name');--}}
{{--            const active = $(this).closest('td').data('active');--}}
{{--            const admin = $(this).closest('td').data('admin');--}}

{{--            // Update the modal--}}
{{--            $('.modal-title').text(`Edit user: ${name}`);--}}
{{--            $('form').attr('action', `/admin/users2/${id}`);--}}
{{--            active==1?$('#active').prop("checked",true):$('#active').prop("checked",false);--}}
{{--            admin==1?$('#admin').prop("checked",true):$('#admin').prop("checked",false);--}}

{{--            $('#name').val(name);--}}
{{--            $('#email').val(email);--}}
{{--            $('input[name="_method"]').val('put');--}}
{{--            // Show the modal--}}
{{--            $('#modal-user').modal('show');--}}
{{--        });--}}



{{--        // Submit the Bootstrap modal form with AJAX--}}
{{--        $('#modal-user form').submit(function (e) {--}}
{{--            // Don't submit the form--}}
{{--            e.preventDefault();--}}
{{--            // Get the action property (the URL to submit)--}}
{{--            const action = $(this).attr('action');--}}
{{--            // Serialize the form and send it as a parameter with the post--}}
{{--            const pars = $(this).serialize();--}}
{{--            console.log(pars);--}}
{{--            // Post the data to the URL--}}
{{--            $.post(action, pars, 'json')--}}
{{--                .done(function (data) {--}}
{{--                    console.log(data);--}}
{{--                    // show success message--}}
{{--                    Student.toast({--}}
{{--                        type: data.type,--}}
{{--                        text: data.text--}}
{{--                    });--}}
{{--                    // Hide the modal--}}
{{--                    $('#modal-user').modal('hide');--}}
{{--                    // Rebuild the table--}}
{{--                    loadTable();--}}
{{--                })--}}
{{--                .fail(function (e) {--}}
{{--                    console.log('error', e);--}}
{{--                    // e.responseJSON.errors contains an array of all the validation errors--}}
{{--                    console.log('error message', e.responseJSON.errors);--}}
{{--                    // Loop over the e.responseJSON.errors array and create an ul list with all the error messages--}}
{{--                    let msg = '<ul>';--}}
{{--                    $.each(e.responseJSON.errors, function (key, value) {--}}
{{--                        msg += `<li>${value}</li>`;--}}
{{--                    });--}}
{{--                    msg += '</ul>';--}}
{{--                    // show the errors--}}
{{--                    Student.toast({--}}
{{--                        type: 'error',--}}
{{--                        text: msg--}}
{{--                    });--}}
{{--                });--}}
{{--        });--}}

{{--        // Delete a genre--}}
{{--        function deleteUser(id) {--}}
{{--            // Delete the genre from the database--}}
{{--            let pars = {--}}
{{--                '_token': '{{ csrf_token() }}',--}}
{{--                '_method': 'delete'--}}
{{--            };--}}
{{--            $.post(`/admin/users2/${id}`, pars, 'json')--}}
{{--                .done(function (data) {--}}
{{--                    console.log('data', data);--}}
{{--                    // Show toast--}}
{{--                    Student.toast({--}}
{{--                        type: data.type,    // optional because the default type is 'success'--}}
{{--                        text: data.text,--}}
{{--                    });--}}
{{--                    // Rebuild the table--}}
{{--                    loadTable();--}}
{{--                })--}}
{{--                .fail(function (e) {--}}
{{--                    console.log('error', e);--}}
{{--                });--}}
{{--        }--}}

{{--        //load users with AJAX--}}
{{--        function loadTable() {--}}
{{--            $.getJSON('/admin/users2/qryUsers')--}}
{{--                .done(function (data) {--}}
{{--                    console.log('data', data);--}}
{{--                    // Clear tbody tag--}}
{{--                    $('tbody').empty();--}}
{{--                    // Loop over each item in the array--}}
{{--                    $.each(data, function (key, value) {--}}
{{--                        let active=""--}}
{{--                        let admin=""--}}
{{--                        if (value.active==1){--}}
{{--                            active="<i class='fas fa-check'></i>"--}}
{{--                        }else{--}}
{{--                            active ="";--}}
{{--                        }--}}
{{--                        if (value.admin==1){--}}
{{--                            admin="<i class='fas fa-check'></i>"--}}
{{--                        }else{--}}
{{--                            admin ="";--}}
{{--                        }--}}
{{--                        let tr = `<tr>--}}
{{--                               <td>${value.id}</td>--}}
{{--                               <td>${value.name}</td>--}}
{{--                               <td>${value.email}</td>--}}
{{--                               <td>${active}</td>--}}
{{--                               <td>${admin}</td>--}}
{{--                               <td data-id="${value.id}"--}}
{{--                                   data-email="${value.email}"--}}
{{--                                   data-name="${value.name}"--}}
{{--                                   data-active="${value.active}"--}}
{{--                                   data-admin="${value.admin}">--}}
{{--                                    <div class="btn-group btn-group-sm">--}}
{{--                                        <a href="#!" class="btn btn-outline-success btn-edit" title="edit" ta-toggle="tooltip">--}}

{{--                                            <i class="fas fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#!" class="btn btn-outline-danger btn-delete" title="delete" ta-toggle="tooltip">--}}
{{--                                            <i class="fas fa-trash"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                               </td>--}}
{{--                           </tr>`;--}}
{{--                        // Append row to tbody--}}
{{--                        $('tbody').append(tr);--}}
{{--                    });--}}
{{--                })--}}
{{--                .fail(function (e) {--}}
{{--                    console.log('error', e);--}}
{{--                })--}}
{{--        }--}}


{{--    </script>--}}
@endsection
