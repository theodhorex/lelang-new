<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('bs/bootstrap.bundle.min.js') }}" defer></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <link href="{{ asset('bs/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('asset/Main Icon.png') }}">
    <link rel="icon" type="image/png"
        href="{{ asset('asset/Main Icon.png') }}">

    <style>
        .remove-focus:focus {
            outline: none;
            box-shadow: none;
        }

        .placeholder::placeholder {
            color: white;
        }

        .register-bottom-bar {
            width: 23vw;
        }

        .action-button {
            background-color: #C6DE41;
            color: #071C21;
            font-weight: 600;
        }

        .action-button:hover {
            background-color: #C6DE41;
            color: #071C21;
            font-weight: 600;
        }

        .cursor {
            cursor: pointer;
        }
    </style>
    <title>Register</title>
</head>

<body class="d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col">
                <img src="{{ asset('asset/Main Logo.png') }}" alt="" class="mx-auto d-block mb-2"
                    style="width: 4vw;">
                <h2 class="text-center mb-5">Register</h2>
            </div>
        </div>
        <form method="POST" action="{{ route('register') }}" id="form-register">
            @csrf

            <div class="row mb-3">
                <!-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> -->

                <div class="col-md-4 d-block mx-auto">
                    <input id="name" type="text"
                        class="form-control @error('name') is-invalid @enderror remove-focus cursor"
                        name="name" required autocomplete="name" autofocus placeholder="Name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                <div class="col-md-4 d-block mx-auto">
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror remove-focus cursor"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                <div class="col-md-4 d-block mx-auto">
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror remove-focus cursor"
                        name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <!-- <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> -->

                <div class="col-md-4 d-block mx-auto">
                    <input id="password-confirm" type="password"
                        class="form-control remove-focus cursor"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Confirm Password">
                </div>
            </div>

            <div class="row d-flex">
                <div class="col-md-4 mx-auto">
                    <button type="submit" class="btn btn-primary fw-semibold d-block mx-auto mb-4" style="width: 100%;">Register</button>
                    <p class="text-center mb-2">Already have account?</p>
                    <a href="/login" class="btn mx-auto d-block fw-semibold" style="background-color: rgb(190, 190, 190);">Login to existing account</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
