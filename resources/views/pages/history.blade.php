@extends('home')
@section('content')

    <div class="row">
        <div class="row">
            @if (count($data) < 1)
                <img class="d-block mx-auto" src="{{ asset('asset/No data found.svg') }}" style="width: 20vw; height: 38vh;"
                    alt="">
            @else
                <h3 class="mb-3">Items that you have submitted before.</h3>
                <hr class="border-dark mx-2">

                <!-- Div for category -->
                <div class="row">
                    <div class="col">
                        <div class="p-3 px-0 pt-0">
                            <div class="row mb-3">
                                <div class="col-3">
                                    <select name="category_filter" id="category_filter" class="form-control cursor"
                                        style="cursor: pointer;">
                                        <option class="text-dark dropdown-item" value="All">All</option>
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
                <div class="row" id="search_container">
                    @foreach ($data as $postingan)
                        <div class="col-md-2 rounded p-1 mx-0">
                            <div class="rounded p-4 shadow" style="cursor: pointer;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                onClick="getPostinganDetails({{ $postingan->postingan->id }})">
                                <img style="width: 30vh; height: 10vw;" class="mb-4 rounded"
                                    src="{{ $postingan->postingan->gambar }}" alt="">
                                <h5 class=" fw-semibold mb-1">{{ Str::limit($postingan->postingan->title, 15) }}</h5>
                                <h6 class=" mb-4">{{ $postingan->postingan->subtitle }}</h6>
                                <h6 class=" mb-3">{{ $postingan->postingan->endauc }}</h6>
                                <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                                <h6 class=" fw-semibold m-0">Rp. {{ $postingan->postingan->start_price }}</h6>
                                <hr class=" my-3 mb-2">
                                <h6 class=" my-0">{{ $postingan->postingan->created_at->diffForHumans() }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>









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


    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        function getPostinganDetails(id) {
            $.get("{{ url('/postingan-details') }}/" + id, {}, function(data, status) {
                $("#imported-page").html(data);
                $(".breadcrumb-title-postingan").html($("#postingan-title").val());
                $("#exampleModal").show();
            });
        }

        // $('#category_filter').change(function() {
        //     $.ajax({
        //         type: 'get',
        //         url: '{{ url('/history') }}',
        //         data: {
        //             result: $(this).val(),
        //             status: true
        //         },
        //         dataType: "json",
        //         success: function(data) {

        //             var col = data.map(function(e) {
        //                 return `
        //         <div class="col-md-2 rounded p-1 mx-0">
        //                     <div class="rounded p-4 shadow" style="cursor: pointer;" data-bs-toggle="modal"
        //                         data-bs-target="#exampleModal" onClick="getPostinganDetails(${e['id']})">
        //                         <img style="width: 30vh; height: 10vw;" class="mb-4 rounded" src="${e['gambar']}"
        //                             alt="">
        //                         <h5 class=" fw-semibold mb-1">${e['title']}</h5>
        //                         <h6 class=" mb-4">${e['subtitle']}</h6>
        //                         <h6 class=" mb-3">${e['endauc']}</h6>
        //                         <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
        //                         <h6 class=" fw-semibold m-0">Rp. ${e["start_price"]}</h6>
        //                         <hr class=" my-3 mb-2">
        //                         <h6 class=" my-0">NTR</h6>
        //                     </div>
        //                 </div>
        //         `;
        //             });
        //             $('#search_container').append('<h3 class="text-light mb-2">Item</h3>');
        //             $('#search_container').html(col);
        //         },
        //         error: function(err) {
        //             console.log(err);
        //         }
        //     });
        // });
    </script>
@endsection
