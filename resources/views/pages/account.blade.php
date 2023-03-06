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
    </style>
    <div class="row mb-5">
        <div class="row mt-2">
            <div class="col">
                <div class="input-group">
                    <span style="border: none;" class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                    <input style="border: none;" id="account_search" type="text" placeholder="Search here..." class="form-control">
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
            <div class="row">
                {{-- <div class="col">
                <a href="#" style="font-size: 1.3vw;" class="fw-semibold ms-1 text-dark"><i class="fa fa-edit"></i></a>
                <a href="#" style="font-size: 1.3vw;" class="fw-semibold ms-1 text-dark"><i class="fa fa-trash"></i></a>
            </div> --}}
                <div class="col">
                    <button type="button" class="btn btn-primary mb-3 float-end fw-semibold" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Add account
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="rounded p-3 px-4 shadow">
                        <h4>Active admin account</h4>
                        <hr class="border-dark">
                        @foreach ($getAdminAccount as $ga)
                            <h5 class="d-flex"><input type="checkbox" name="" id=""
                                    value="{{ $ga->id }}" class="form-check-input m-0 p-0 me-2">
                                {{ $ga->name }} - <span class="my-auto mx-2"
                                    style="font-size: 0.7vw;">Administrator</span>
                                <div class="float-end">
                                    <a href="#" style="font-size: 1vw;"
                                        class="fw-semibold ms-1 text-dark cursor-pointer"
                                        onClick="getAccountDetail({{ $ga->id }})"><i class="fa fa-edit"></i></a>
                                    <a href="#" style="font-size: 1vw;" class="fw-semibold ms-1 text-dark"><i
                                            class="fa fa-trash"></i></a>
                                </div>
                            </h5>
                        @endforeach
                    </div>
                </div>
                <div class="col-6">
                    <div class="rounded p-3 px-4 shadow">
                        <h4>Active officer account</h4>
                        <hr class="border-dark">
                        @foreach ($getOfficerAccount as $go)
                            <h5 class=""><input type="checkbox" name="" id=""
                                    value="{{ $go->id }}" class="form-check-input m-0 p-0 me-2">
                                {{ $go->name }} - <span class="my-auto mx-2" style="font-size: 0.7vw;">Officer</span>
                                <div class="float-end">
                                    <a href="#" style="font-size: 1vw;" class="fw-semibold ms-1 text-dark"
                                        onClick="getAccountDetail({{ $go->id }})"><i
                                            class="fa
                                        fa-edit"></i></a>
                                    <a style="font-size: 1vw;" onClick="deleteAccount({{ $go->id }})"
                                        class="fw-semibold ms-1 text-dark"><i class="fa fa-trash"></i></a>
                                </div>
                            </h5>
                        @endforeach
                    </div>
                </div>
            </div>
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

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Edit account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imported-pages"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#account_search').on('keyup', function(){
                // console.log($(this).val());

                $.ajax({
                    type: "GET",
                    url: "",
                    data: {
                        nama: $(this).val()
                    },
                    success: function(data){
                        console.log('Work!');
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
            });
        });
        function getAccountDetail(id) {
            $.get("{{ url('/account-detail') }}/" + id, {}, function(data, status) {
                // $("#imported-pages").html(data);
                $("#exampleModal").show();
            });
        }

        function deleteAccount(id) {
            if (confirm('Are you sure you want to delete this account?') == true) {
                location.href = "{{ url('delete-account') }}" + '/' + id;
            }
        }
    </script>
@endsection
