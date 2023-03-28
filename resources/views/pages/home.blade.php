@extends('home')
@inject('carbon', 'Carbon\Carbon')
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
            @if (Auth::user()->role != 'user')
                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title fw-semibold mb-2">Item</h4>
                                        <h6 class="card-text fw-semibold mb-2">
                                            {{ $total_postingan->count() }}
                                        </h6>
                                        <p class="card-text">
                                            <b class="text-info">{{ $new_postingan->count() }} New item</b> this week.
                                        </p>
                                        {{-- <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a> --}}
                                    </div>
                                    <div class="col-3">
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
                                            <b class="text-info">{{ $new_account->count() }} Newly registered</b> this week.
                                        </p>
                                    </div>
                                    <div class="col-3">
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
                                    <div class="col-3">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#" class="btn btn-primary mx-auto"><i
                                                    class="fa fa-inbox"></i></a>
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
                                            {{ $customer->count() }}
                                        </h6>
                                        <p class="card-text">
                                            <b class="text-info">{{ $new_customer->count() }} Newly registered</b> this
                                            week.
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#" class="btn btn-primary mx-auto"><i
                                                    class="fa fa-users"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    @if ($postingan->count() > 0)
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
                                                            <h5 class="fw-semibold">{{ Str::limit($post->title, 12) }} -
                                                                {{ str_replace(['[', ']', '"'], '', $account->where('id', $post->user_id)->pluck('name')) }}
                                                            </h5>
                                                        </div>
                                                        <div class="col">
                                                            <p class="m-0 float-end">
                                                                {{ $post->created_at->diffForHumans() }}
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
                    @endif
                    {{-- <div class="col-md">
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
                    </div> --}}
                </div>
            @endif

            @if (Auth::user()->role == 'user')
                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="card-title fw-semibold mb-2">Your Order</h4>
                                        <h6 class="card-text fw-semibold mb-2">
                                            {{ $your_order->count() }}
                                        </h6>
                                        <p class="card-text">
                                            <b class="text-info">{{ $new_order->count() }} New item</b> this week.
                                        </p>
                                        {{-- <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a> --}}
                                    </div>
                                    <div class="col-3">
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
                                        <h4 class="card-title fw-semibold mb-2">Your Inbox</h4>
                                        <h6 class="card-text fw-semibold mb-2">
                                            {{ $user_inbox->count() }}
                                        </h6>
                                        <p class="card-text">
                                            <b class="text-info">{{ $new_user_inbox->count() }} New item</b> this week.
                                        </p>
                                        {{-- <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a> --}}
                                    </div>
                                    <div class="col-3">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#" class="btn btn-primary"><i class="fa fa-square"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                @if ($list_item->count() > 0)
                    <div class="col">
                        <div class="row d-block">
                            <div class="row mx-2 mb-2">
                                <div class="col d-inline-flex">
                                    <h3>Latest item</h3>
                                    <a class="my-auto mx-3 text-decoration-none fw-semibold "
                                        href="{{ url('/list-item') }}">See
                                        all</a>
                                </div>
                            </div>
                            <div id="result-container" class="row mx-auto">
                                @foreach ($list_item as $list)
                                    @php
                                        $lel = explode('-', $list->endauc);
                                        $lels = $lel[1] . '/' . $lel[2] . '/' . $lel[0];
                                        $endauc = App\Http\Controllers\MainController::dateConvert($lels);
                                    @endphp
                                    <div class="col-md-2 rounded p-1 mx-0">
                                        <div class="rounded p-4 shadow" style="cursor: pointer;" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            onClick="getPostinganDetails({{ $list->id }})">
                                            <img style="width: 30vh; height: 10vw;" class="mb-4 rounded"
                                                src="{{ $list->gambar }}" alt="">
                                            <h5 class=" fw-semibold mb-1">{{ Str::limit($list->title, 15) }}</h5>
                                            <h6 class=" mb-4">{{ $list->subtitle }}</h6>
                                            <h6 class=" mb-3">{{ $endauc }}</h6>
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
                @endif
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

        function editpostingansDetails() {
            let title = $("#postingan-title").val();
            let subtitle = $("#postingan-subtitle").val();
            let start_price = $("#postingan-start_price").val();
            let endauc = $("#postingan-endauc").val();
            let descandcond = $("#postingan-descandcond").val();
            let location = $("#postingan-location").val();
            $('#active-breadcrumb').html(`${title}`);
            $('#title').replaceWith(
                `<input id="title" name="title" type="text" value="${title}" class="form-control mb-2 cursor">`
            );
            $('#subtitle').replaceWith(
                `<input id="subtitle" name="subtitle" type="text" value="${subtitle}" class="form-control mb-2 cursor">`
            );
            $('#start_price').replaceWith(
                `<input id="start_price" name="start_price" type="text" value="${start_price}" class="form-control mb-2 cursor">`
            );
            $('#endauc').replaceWith(
                `<input id="endauc" name="endauc" type="date" value="${endauc}" class="form-control mb-2 cursor">`
            );
            $('#location').replaceWith(
                `<input id="location" name="location" type="text" value="${location}" class="form-control mb-2 cursor">`
            );
            $('#descandcond').replaceWith(
                `<textarea id="descandcond" cols="30" rows="10" name="descandcond" class="form-control mb-2 cursor">${descandcond}</textarea>`
            );
            $('#modal-footer').append(
                `<button type="submit" class="btn btn-primary fw-semibold" onClick="event.preventDefault(); document.getElementById('update-postingan-form').submit();">Save</button>`
            );
        }

        function setStatus() {
            let status = $('#status').val();

            if (status == 'Open') {
                $('#status_postingan').html(
                    `Status : <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary active" id="open_button" onClick="openButton()">Open</button>
                    <button type="button" class="btn btn-primary" id="close_button" onClick="closeButton()">Close</button>
                </div>`
                );
            } else if (status == 'Closed') {
                $('#status_postingan').html(
                    `Status : <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary" id="open_button" onClick="openButton()">Open</button>
                    <button type="button" class="btn btn-primary active" id="close_button" onClick="closeButton()">Close</button>
                </div>`
                );
            }
        }

        // Open & Close auction
        function closeButton() {
            let target_id = $('#id').val();
            $.ajax({
                type: "GET",
                url: "{{ url('set-auction') }}/" + target_id,
                data: {
                    status: 'Closed'
                },
                success: function(data) {
                    console.log('Closed!');
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function openButton() {
            let target_id = $('#id').val();
            $.ajax({
                type: "GET",
                url: "{{ url('set-auction') }}/" + target_id,
                data: {
                    status: 'Open'
                },
                success: function(data) {
                    console.log('Open!');
                },
                error: function(err) {
                    console.log(err);
                }
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
                            '#00d0ff61',
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
