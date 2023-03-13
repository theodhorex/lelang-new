@extends('home')
@section('content')
    <style>
        .main-border-color {
            border: 2px solid #C6DE41;
        }

        .remove-focus:active {
            outline: none;
            box-shadow: none;
            border: 2px solid $C6DE41
        }

        .remove-focussfocus {
            outline: none;
            box-shadow: none;
            color: white;
        }

        .placeholder::placeholder {
            color: white;
        }

        .cursor {
            cursor: pointer;
        }

        .fit {
            white-space: nowrap;
            width: 1%;
        }
    </style>
    <div class="row mb-5">
        <div class="row mt-2">
            <div class="col">
                <div class="input-group">
                    <span style="border: none;" class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                    <input style="border: none;" id="account_search" type="text" placeholder="Search here..."
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="d-block mx-auto">
            <hr class="border-dark mx-1">
        </div>

        <div class="col">
            @if (session('success'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="row px-1">
                <div class="col">
                    <label for="" class="form-label">Role</label>
                    <select name="role_filter" id="role_filter" class="form-control w-50">
                        <option value="" disabled selected>-- Role Filter --</option>
                        <option value="admin">Admin</option>
                        <option value="officer">Officer</option>
                    </select>
                </div>
                <div class="col">
                    <div class="float-end">
                        <label for=""></label><br>
                        <button type="button" class="btn btn-primary mb-3 fw-semibold" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add account
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-3 my-3">
            <table class="table table-bordered rounded">
                @php
                    $i = 1;
                @endphp
                <thead>
                    <tr>
                        <th scope="col" class="text-center fit px-3">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Created at</th>
                        <th scope="col" class="fit text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="target_container">
                    @foreach ($account as $item)
                        <tr>
                            <th class="text-center fit px-3" scope="row">{{ $i++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td class="text-capitalize">{{ $item->role }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td class="fit">
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModals" onClick="getAccountDetail({{ $item->id }})"><i
                                        class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"
                                    onClick="deleteAccount({{ $item->id }})"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    {{-- Modal --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Add account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="px-2" action="{{ url('/add-account') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option class="text-dark" value="" selected="true" disabled="disabled">-- Select
                                    Role
                                    --
                                </option>
                                <option class="text-dark" value="admin">Admin</option>
                                <option class="text-dark" value="officer">Officer</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabels" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabels">Edit account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="imported-pages"></div>

            </div>
        </div>
    </div>


    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#account_search').on('keyup', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('account-pages') }}",
                    data: {
                        result: $(this).val(),
                        search: true
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let i = 1;
                        let result = data.map(function(e) {
                            let timestamp = moment(e.created_at).fromNow();
                            return `
                                    <tr>
                                        <th class="text-center fit px-3" scope="row">${i++}</th>
                                        <td>${e['name']}</td>
                                        <td class="text-capitalize">${e['role']}</td>
                                        <td>${timestamp}</td>
                                        <td class="fit">
                                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModals" onClick="getAccountDetail(${e['id']})"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onClick="deleteAccount(${e['id']})"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                            `;
                        });

                        $('#target_container').html(result);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });

            $('#role_filter').change(function() {
                $.ajax({
                    type: "GET",
                    url: "{{ url('account-pages') }}",
                    data: {
                        result: $(this).val(),
                        status: true
                    },
                    dataType: "JSON",
                    success: function(data) {
                        let i = 1;
                        let result = data.map(function(e) {
                            let timestamp = moment(e.created_at).fromNow();
                            return `
                                    <tr>
                                        <th class="text-center fit px-3" scope="row">${i++}</th>
                                        <td>${e['name']}</td>
                                        <td class="text-capitalize">${e['role']}</td>
                                        <td>${timestamp}</td>
                                        <td class="fit">
                                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleModals" onClick="getAccountDetail(${e['id']})"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onClick="deleteAccount(${e['id']})"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                            `;
                        });

                        $('#target_container').html(result);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });

        function getAccountDetail(id) {
            $.get("{{ url('/account-detail') }}/" + id, {}, function(data, status) {
                $("#imported-pages").html(data);
                $("#exampleModals").show();
            });
        }

        function deleteAccount(id) {
            if (confirm('Are you sure? you want to delete this account?') == true) {
                location.href = "{{ url('delete-account') }}" + '/' + id;
            }
        }
    </script>
@endsection
