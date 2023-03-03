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
    <div class="row my-3">
        <div class="col-md d-inline-flex">
            <div class="input-group">
                <span style="border: none;" class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                <input style="border: none;" name="search" id="search" type="search"
                    placeholder="Search your item here...." class="form-control">
            </div>
        </div>
    </div>
    <hr class="border-dark mb-3">


    @if (count($latest_postingan) < 1)
        <img class="d-block mx-auto" src="{{ asset('asset/No data found.svg') }}" style="width: 20vw; height: 38vh;"
            alt="">
    @else
        <div id="new-item" class="row mb-4">
            <h3 class="mb-2">New item</h3>
            @foreach ($latest_postingan as $postingan)
                <div class="col-md-2 rounded p-1 mx-0">
                    <div class="rounded p-4 shadow cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        onClick="getPostinganDetails({{ $postingan->id }})">
                        <img style="width: 19vw; height: 23vh;" class="mb-4 rounded" src="{{ $postingan->gambar }}"
                            alt="">
                        <h5 class=" fw-semibold mb-1">{{ Str::limit($postingan->title, 15) }}</h5>
                        <h6 class=" mb-4">{{ $postingan->subtitle }}</h6>
                        <h6 class=" mb-3">{{ $postingan->endauc }}</h6>
                        <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                        <h6 class=" fw-semibold m-0">Rp. {{ $postingan->start_price }}</h6>
                        <hr class=" my-3 mb-2">
                        <h6 class=" my-0">{{ $postingan->created_at->diffForHumans() }}</h6>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Div for category -->
        <div class="row">
            <div class="col">
                <h4 class="px-0 mb-2" id="category_title">Category</h4>
                <div class="p-3 px-0 pt-0">
                    <div class="row mb-3">
                        <div class="col-3">
                            <select name="category_filter" id="category_filter" class="form-control cursor">
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
        </div>

        <div id="search_container" class="row">
            @foreach ($get_all as $list_item)
                <div class="col-md-2 rounded p-1 mx-0">
                    <div class="rounded p-4 shadow cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        onClick="getPostinganDetails({{ $list_item->id }})">
                        <img style="width: 19vw; height: 23vh;" class="mb-4 rounded" src="{{ $list_item->gambar }}"
                            alt="">
                        <h5 class=" fw-semibold mb-1">{{ Str::limit($list_item->title, 15) }}</h5>
                        <h6 class=" mb-4">{{ $list_item->subtitle }}</h6>
                        <h6 class=" mb-3">{{ $list_item->endauc }}</h6>
                        <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                        <h6 class=" fw-semibold m-0">Rp. {{ $list_item->start_price }}</h6>
                        <hr class=" my-3 mb-2">
                        <h6 class=" my-0">{{ $list_item->created_at->diffForHumans() }}</h6>
                    </div>
                </div>
            @endforeach
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
                <div class="modal-header" style="background-color: #071C21; border-bottom: 1px solid #1D5F6F;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalToggleLabel2">Bid Data</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #071C21;">
                    @if (Auth::user()->role == 'user')
                        <div id="imported-bid-data-details"></div>
                    @else
                        <div id="imported-bid-data-details"></div>
                    @endif
                </div>
                <div class="modal-footer" style="background-color: #071C21; border-top: 1px solid #1D5F6F;">
                    <button class="btn fw-semibold" data-bs-target="#exampleModal" data-bs-toggle="modal"
                        style="background-color: #C6DE41;">Back to
                        first</button>
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

        function getWinnerName() {
            $('#winner_name').val($('#username').val());
            // console.log()
        }

        $('#search').on('keyup', function() {
            $.ajax({
                type: 'get',
                url: '{{ url('/search') }}',
                data: {
                    result: $(this).val(),
                    search: true
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
                    $('#search_container').html(col);
                    $('#new-item').addClass('d-none');
                    $('#category_filter').addClass('d-none');
                    $('#category_title').html(`Here ur result of "${result}".`);
                    $('#horizontal-lines').addClass('d-none');
                },
                error: function(err) {
                    alert(err.responseText);
                }
            });
        });


        $('#category_filter').change(function() {
            $.ajax({
                type: 'get',
                url: '{{ url('/search') }}',
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
                    $('#search_container').append('<h3 class="text-light mb-2">Item</h3>');
                    $('#search_container').html(col);
                },
                error: function(err) {
                    alert(err.responseText);
                }
            });
        });
    </script>
@endsection
