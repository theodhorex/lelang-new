@extends('home')
@section('content')
    <style>
        .border-dashed {
            border-style: dashed;
        }

        .remove-focus:focus {
            outline: none;
            box-shadow: none;
            color: white;
        }

        .placeholder::placeholder {
            color: white;
        }

        .action-button {
            background-color: #C6DE41;
            color: #071C21;
            font-weight: 600;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #C6DE41;
            color: #071C21;
            font-weight: 600;
            cursor: pointer;
        }

        .cursor {
            cursor: pointer;
        }
    </style>
    <div class="row">
        <form action="{{ url('/profiles') }}" method="POST" enctype="multipart/form-data" id="fomr">
            @csrf
            <div class="col p-4 rounded shadow">
                @if(session('success'))
                <div class="alert alert-info d-flex" role="alert">
                    <div class="col"><span>{{ session('success') }}</span></div>
                    <div class="col">
                        <button type="button" class="btn-close my-auto float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <div class="row px-4">
                    <h4 class="p-0 m-0">Profile</h4>
                    <span style="color: #C5C5C5" class="p-0 m-0">This is your profile.</span>
                </div>
                <hr class="border-dark my-3 mb-4 mx-3">

                <div class="row px-3 mb-2">
                    <div class="col px-0 mx-1">
                        <div class="form-group mb-3 mx-0 px-0">
                            <label for="name" class="form-label fw-semibold">Username</label>
                            <input type="text" name="name" id="name" class="form-control cursor"
                                value="{{ $user_data->name }}">
                        </div>
                    </div>

                </div>

                <div class="row px-3 mb-4">
                    <div class="col px-0 mx-1">
                        <div class="form-group">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="text" name="email" id="email" class="form-control cursor"
                                value="{{ $user_data->email }}">
                        </div>
                    </div>
                    <div class="col px-0 mx-1">
                        <div class="form-group">
                            <label for="phone_number" class="form-label fw-semibold">Phone number</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control cursor"
                                value="{{ $user_data->phone_number }}">
                        </div>
                    </div>
                </div>

                <div class="row px-3 mb-4">
                    <div class="col-2 px-0">
                        <div class="d-flex align-items-center">
                            <div class="form-group mb-3 mx-0 px-0">
                                <label class="form-label fw-semibold">Profile Photo</label>
                                @if (Auth::user()->profile_photo == '')
                                    <div style="width: 4vw; height: 8vh; border: 1px solid #969696" id="img-div"
                                        class="bg-transparent rounded-circle">
                                    </div>
                                @else
                                    <img src="{{ $user_data->profile_photo }}" alt=""
                                        style="width: 4vw; height: 8vh;" class="rounded-circle mx-0 px-0">
                                @endif
                            </div>
                            <label for="profile_photo" class="text-decoration-none mt-3 mx-3 rounded p-2"
                                style="border: 1px solid black; border-style: dashed;">Browse</label>
                            <input type="file" name="profile_photo" accept="image/*" id="profile_photo" class="d-none">
                        </div>
                    </div>
                    <div class="col-10 px-0">
                        <div class="form-group mb-3 mx-0 px-0">
                            <label for="about_me" class="py-0 my-0 form-label fw-semibold">About You</label>
                            <br>
                            <span class="my-0" style="color: #C5C5C5;">Lorem ipsum dolor sit amet consectetur, adipisicing
                                elit.
                                Enim natus ipsa perferendis, minima hic tempore!</span>
                            <textarea name="about_me" id="about_me" cols="10" rows="4" class="form-control mt-2 cursor">{{ $user_data->about_me }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row px-2">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" id="btn_submit" disabled>Save Changes</button>
                        <a class="btn btn-danger" href="{{ route('perform-logout') }}">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#profile_photo").change(function() {
                var file = this.files;
                var output = $('#img-div');
                output.html("");
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        output.append(`<img id="profile_photoss" class="rounded-circle" style="width: 4vw; height: 8vh; color: white;"
                            src="${event.target.result}" alt="Your preview">`);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('input, textarea').change(function() {
                $("#btn_submit").removeAttr('disabled');
            });
        });
    </script>
@endsection
