@extends('home')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <span style="border: none;" class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                        <input style="border: none;" type="text" placeholder="Search here..." class="form-control">
                    </div>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="row mb-3">
                <div class="col-md-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title fw-semibold mb-2">Item</h4>
                                    <h6 class="card-text fw-semibold mb-2">
                                        {{ $postingan->count() }}
                                    </h6>
                                    <p class="card-text">
                                        <b class="text-info">2 New item</b> this week.
                                    </p>
                                    {{-- <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a> --}}
                                </div>
                                <div class="col-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn-primary"><i class="fa fa-square"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title fw-semibold mb-2">Account</h4>
                                    <h6 class="card-text fw-semibold mb-2">
                                        {{ $account->count() }}
                                    </h6>
                                    <p class="card-text">
                                        <b class="text-info">2 Newly registered</b> this week.
                                    </p>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn-primary"><i class="fa fa-user"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title fw-semibold">Inbox</h4>
                                    <h6 class="card-text fw-semibold mb-2">
                                        {{ $user_reply->count() }}
                                    </h6>
                                    <p class="card-text">
                                        <b class="text-info">2 New inbox</b> this week.
                                    </p>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn-primary mx-auto"><i class="fa fa-inbox"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title fw-semibold">Customer</h4>
                                    <h6 class="card-text fw-semibold mb-2">
                                        {{ $account->where('role', 'user')->count() }}
                                    </h6>
                                    <p class="card-text">
                                        <b class="text-info">2 Newly registered</b> this week.
                                    </p>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="btn btn-primary mx-auto"><i class="fa fa-users"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row m-1">
                                <div class="col">
                                    <h3 class="card-text fw-semibold mb-4">Latest activity</h3>
                                    @foreach ($postingan as $post)
                                        <div class="massages mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="fw-semibold">{{ $post->title }} -
                                                        {{ str_replace(['[', ']', '"'], '', $account->where('id', $post->user_id)->pluck('name')) }}
                                                    </h5>
                                                </div>
                                                <div class="col">
                                                    <p class="m-0 float-end">{{ $post->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                            <p>
                                                {{ Str::limit($post->descandcond, 70) }}
                                            </p>
                                        </div>
                                        <hr class="border-secondary">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row m-1">
                                <div class="col">
                                    <h3 class="card-text fw-semibold mb-4">Statistic</h3>
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row d-block">
                        <div class="row mx-2 mb-2">
                            <div class="col d-inline-flex">
                                <h3>Latest item</h3>
                                <a class="my-auto mx-3 text-decoration-none fw-semibold " href="#">See all</a>
                            </div>
                        </div>
                        <div id="result-container" class="row mx-auto">
                            @foreach ($list_item as $list)
                                <div class="col-md-2 rounded p-1 mx-0">
                                    <div class="rounded p-4 shadow" style="cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onClick="getPostinganDetails({{ $list->id }})">
                                        <img style="width: 30vh; height: 10vw;" class="mb-4 rounded"
                                            src="{{ $list->gambar }}" alt="">
                                        <h5 class=" fw-semibold mb-1">{{ $list->title }}</h5>
                                        <h6 class=" mb-4">{{ $list->subtitle }}</h6>
                                        <h6 class=" mb-3">{{ $list->endauc }}</h6>
                                        <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                                        <h6 class=" fw-semibold m-0">Rp. {{ $list->start_price }}</h6>
                                        <hr class=" my-3 mb-2">
                                        <h6 class=" my-0">{{ $list->created_at->diffForHumans() }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            {{-- Footer --}}
            <div class="row p-5">
                <div class="col-6" style="border-right: 0.1px solid #cccccc;">
                    <div class="d-inline-flex">
                        <img style="width: 4.5vw;" src="{{ asset('asset/Main Logo.png') }}" alt="">
                        <h3 class="my-auto mx-2">Celtic Auction</h3>
                    </div>
                    <p class="text-secondary mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum aperiam
                        consequatur
                        Illum sunt perferendis voluptate omnis tempore!</p>
                    <p class="mb-5" style="color: #7E7E7E">© 2022, Celtic Auction. Powered by BOT.</p>

                    <div class="d-inline-flex">
                        <a href="#" class="text-light me-2 rounded-circle"
                            style="padding: 0.1vw 0.95vh; background-color: #3B579D;"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="text-light me-2 rounded-circle"
                            style="padding: 0.1vw 0.95vh; background-color: #FF0E4C;"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="text-light me-2 rounded-circle"
                            style="padding: 0.1vw 0.95vh; background-color: #FF0000;"><i class="fa fa-youtube"></i></a>
                        <a href="#" class="text-light me-2 rounded-circle"
                            style="padding: 0.1vw 0.95vh; background-color: #1D9BF0;"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-6" style="border-left: 0.1px solid #cccccc;">
                    <div class="row">
                        <div class="col-6 px-4 pt-2">
                            <h3>This market</h3>
                            <ul class="list-group list-group-flush border-none">
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    About Brand Name</li>
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    Factories</li>
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    Careers</li>
                            </ul>
                        </div>
                        <div class="col-6 px-4 pt-2">
                            <h3>Page</h3>
                            <ul class="list-group list-group-flush border-none">
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    Home</li>
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    Account</li>
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    Form</li>
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    List item</li>
                                <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                    style="color: #7E7E7E; cursor: pointer;">
                                    Stat</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
        role="dialog" style="z-index: 1400;">
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-5" style="border-bottom: 1px solid #E6E6E6;">
                    <nav class="d-flex" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb my-auto">
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="/home">Home</a>
                            </li>
                            <li id="active-breadcrumb" class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imported-page" style="overflow-y: auto; overflow-x: hidden;"></div>
                </div>
                <div id="modal-footer" class="modal-footer" style="border-top: 1px solid #E6E6E6;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1" role="dialog" style="z-index: 1600;">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid #E6E6E6;">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Bid Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Auth::user()->role == 'user')
                        <div id="imported-bid-data-details"></div>
                    @else
                        <div id="imported-bid-data-details"></div>
                    @endif
                </div>
                <div class="modal-footer" style="border-top: 1px solid #E6E6E6;">
                    <button class="btn btn-primary fw-semibold" data-bs-target="#exampleModal"
                        data-bs-toggle="modal">Back to first</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        // JQuery Function
        function getPostinganDetails(id) {
            $.get("{{ url('/postingan-details') }}/" + id, {}, function(data, status) {
                $("#imported-page").html(data);
                $("#exampleModal").show();
            });
        }

        function getBidDataDetails(id) {
            $.get("{{ url('/get-bid-data-details') }}/" + id, {}, function(data, status) {
                $("#imported-bid-data-details").html(data);
                $("#exampleModalToggle2").show();
            });
        }

        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        data: [70, 59, 80, 81, 56, 55, 40],
                        backgroundColor: [
                            '#00D1FF',
                        ],
                        borderColor: [
                            '#002B34',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: [
                            '#00E5A1',
                        ],
                        borderColor: [
                            '#003223',
                        ],
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection