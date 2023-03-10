@extends('home')
@section('content')
    <style>
        .remove-hover:hover {
            outline: none;
        }

        .main-color {
            color: #C6DE41;
        }

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
        <div class="col py-3">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <span style="border: none;" class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                        <input style="border: none;" type="text" placeholder="Search here..." class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <hr class="border-secondary mb-4">
        <!-- Div for category -->
        @if (count($listItem) < 1)
            <img class="d-block mx-auto" src="{{ asset('asset/No data found.svg') }}" style="width: 20vw; height: 38vh;"
                alt="">
        @else
            <div class="row">
                <div class="col">
                    <h4 class="px-0 mb-2" id="category_title">Category</h4>
                    <div class="p-3 px-0 pt-0">
                        <div class="row mb-3">
                            <div class="col">
                                <select name="category_filter" id="category_filter"
                                    class="form-control remove-focus cursor text-dark">
                                    <option class="text-dark dropdown-item" value="">All</option>
                                    <option class="text-dark dropdown-item" value="Art">Art</option>
                                    <option class="text-dark dropdown-item" value="Building">Building</option>
                                    <option class="text-dark dropdown-item" value="Automotive">Automotive</option>
                                    <option class="text-dark dropdown-item" value="Electronic">Electronic</option>
                                    <option class="text-dark dropdown-item" value="Music">Music</option>
                                    <option class="text-dark dropdown-item" value="Vintage">Vintage</option>
                                    <option class="text-dark dropdown-item" value="Photography">Photography</option>
                                    <option class="text-dark dropdown-item" value="Baby & Kids">Baby & Kids</option>
                                    <option class="text-dark dropdown-item" value="Toys">Toys</option>
                                    <option class="text-dark dropdown-item" value="Furniture">Furniture</option>
                                    <option class="text-dark dropdown-item" value="Cloth">Cloth</option>
                                    <option class="text-dark dropdown-item" value="Pant">Pant</option>
                                    <option class="text-dark dropdown-item" value="Sneaker">Sneaker</option>
                                    <option class="text-dark dropdown-item" value="Accecories">Accecories</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    @if(Auth::user()->role != 'user')
                    <h4 class="px-0 mb-2" id="category_title">Status</h4>
                    <div class="p-3 px-0 pt-0">
                        <div class="row mb-3">
                            <div class="col">
                                <select name="status_filter" id="status_filter"
                                    class="form-control remove-focus cursor text-dark">
                                    <option class="text-dark dropdown-item" disabled selected>-- Status --</option>
                                    <option class="text-dark dropdown-item" value="Open">Open</option>
                                    <option class="text-dark dropdown-item" value="Closed">Closed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col">
                <div id="result-container" class="row">
                    @foreach ($listItem as $list)
                        <div class="col-md-2 rounded p-1 mx-0">
                            <div class="rounded p-4 shadow cursor-pointer" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" onClick="getPostinganDetails({{ $list->id }})">
                                <img style="width: 19vw; height: 23vh;" class="mb-4 rounded" src="{{ $list->gambar }}"
                                    alt="">
                                <h5 class=" fw-semibold mb-1 text-truncate">{{ $list->title }}</h5>
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
    @endif


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

    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
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



        $('#category_filter').change(function() {
            $.ajax({
                type: 'get',
                url: "{{ url('/list-item') }}",
                data: {
                    result: $(this).val(),
                    status: true
                },
                dataType: "json",
                success: function(data) {
                    var col = data.map(function(e) {
                        return `
                <div class="col-md-2 rounded p-1 mx-0">
                                <div class="rounded p-4 shadow cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onClick="getPostinganDetails(${e['id']})">
                                    <img style="width: 19vw; height: 23vh;" class="mb-4 rounded" src="${e['gambar']}"
                                        alt="">
                                    <h5 class=" fw-semibold mb-1">${e['title']}</h5>
                                    <h6 class=" mb-4">${e['subtitle']}</h6>
                                    <h6 class=" mb-3">${e['endauc']}</h6>
                                    <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                                    <h6 class=" fw-semibold m-0">Rp. ${e["start_price"]}</h6>
                                    <hr class=" my-3 mb-2">
                                    <h6 class=" my-0"></h6>
                                </div>
                            </div>
                `;
                    });
                    $('#result-container').html(col);
                },
                error: function(err) {
                    console.log(err.responseText);
                }
            });
        });

        $('#status_filter').change(function() {
            $.ajax({
                type: "GET",
                url: "{{ url('/list-item') }}",
                data: {
                    results: $(this).val(),
                    statuss: true
                },
                dataType: "JSON",
                success: function(data) {
                    var col = data.map(function(e) {
                        return `
                <div class="col-md-2 rounded p-1 mx-0">
                                <div class="rounded p-4 shadow cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onClick="getPostinganDetails(${e['id']})">
                                    <img style="width: 19vw; height: 23vh;" class="mb-4 rounded" src="${e['gambar']}"
                                        alt="">
                                    <h5 class=" fw-semibold mb-1 text-truncate">${e['title']}</h5>
                                    <h6 class=" mb-4">${e['subtitle']}</h6>
                                    <h6 class=" mb-3">${e['endauc']}</h6>
                                    <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                                    <h6 class=" fw-semibold m-0">Rp. ${e["start_price"]}</h6>
                                    <hr class=" my-3 mb-2">
                                    <h6 class=" my-0"></h6>
                                </div>
                            </div>
                `;
                    });
                    $('#result-container').html(col);
                },
                error: function(err) {
                    console.log(err)
                    console.log('err')
                }
            });
        });

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
    </script>
@endsection
