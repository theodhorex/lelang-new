<style>
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

@php
    $i = 1;
@endphp

@if (Auth::user()->role == 'admin')
    <form action="{{ url('/postingan-details-update', $postingans->id) }}" method="post" id="update-postingan-form">
        @csrf
    @elseif(Auth::user()->role == 'officer')
        <form action="{{ url('/postingan-details-update', $postingans->id) }}" method="post" id="update-postingan-form">
            @csrf
@endif
<div class="row p-3">
    <div class="col-6">
        <img class="rounded" src="{{ $postingans->gambar }}" alt="" style="width: 100%;" class="p-0 m-0">
    </div>
    <div class="col-6 p-3 px-4">
        <div class="row">
            <div class="col">
                <h3 id="title" class="fw-semibold mb-1">{{ $postingans->title }}</h3>
                <h4 id="subtitle" class="mb-3 mt-0">{{ $postingans->subtitle }}</h4>
            </div>
            <div class="col">
                <div class="d-inline-flex float-end">
                    <h5 class="fw-semibold mx-2 my-auto">{{ $postingans->category }}</h5>
                    <h5 class="fw-semibold mx-2 my-auto @if (Auth::user()->role != 'user') d-none @endif"><i
                            class="fa fa-exclamation-circle"></i></h5>
                    <a href="#" onClick="editpostingansDetails()"
                        class="text-dark my-auto mx-1 text-decoration-none @if (Auth::user()->role == 'user') d-none @endif"
                        style="font-size: .95vw;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="{{ url('/delete-postingan', $postingans->id) }}"
                        onclick="return confirm('Are you sure, to delete {{ $postingans->title }}?')"
                        class="text-dark my-auto mx-1 text-decoration-none @if (Auth::user()->role == 'user') d-none @endif"
                        style="font-size: .95vw;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <h2 id="start_price" class="fw-bold mb-1">Rp. {{ $postingans->start_price }}</h2>
        <h5 id="endauc" class="mb-4">
            Closing date : <b>{{ $postingans->endauc }}</b>
        </h5>

        @if (count($data_bid) < 1)
            <hr class="border-dark">
            <h4>No bid data now.</h4>
        @else
            <div class="row">
                <div class="col">
                    <h4>Leaderboard</h4>
                </div>
                <div class="col">
                    <a href="#" class="float-end" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                        onClick="getBidDataDetails({{ $postingans->id }})">See All</a>
                </div>
            </div>
            <table class="table table-borderless table-responsive"
                style="border: 1px solid #5C5C5C; border-radius: 6px;">
                <thead style="border: 1px solid #5C5C5C; border-radius: 6px;">
                    <tr>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" scope="col">No
                        </th>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" scope="col">
                            Name
                        </th>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" scope="col">
                            Bid
                        </th>
                    </tr>
                </thead>
                <tbody style="border: 1px solid #5C5C5C; border-radius: 6px;">
                    @foreach ($data_bid as $bid)
                        <tr>
                            <th style="border: 1px solid #5C5C5C; border-radius: 6px;" scope="row">
                                {{ $i++ }}.
                            </th>
                            <td style="border: 1px solid #5C5C5C; border-radius: 6px;">
                                @if (Auth::user()->name == $bid->user->name)
                                    You
                                @else
                                    {{ $bid->user->name }}
                                @endif
                            </td>
                            <td style="border: 1px solid #5C5C5C; border-radius: 6px;">Rp.
                                {{ $bid->bid }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if (Auth::user()->role == 'user')
            <form action="{{ url('/bid-send', $postingans->id) }}" method="post" class="mb-2">
                @csrf
                <h4 class="mb-2 @if (Auth::user()->role == 'admin') d-none @endif">Your bid</h4>
                <input type="number" name="bidd" id="bidd"
                    class="form-control bg-transparent remove-focus placeholder cursor mb-3 @if (Auth::user()->role == 'admin') d-none @endif"
                    required>
                <button type="submit" class="btn fw-semibold @if (Auth::user()->role == 'admin') d-none @endif"
                    style="background-color: #C6DE41;">Bid</button>
            </form>
        @endif
        <span style="color: #7E7E7E;" class="@if (Auth::user()->role != 'user') d-none @endif">*Winners will be notified
            via their inbox.</span>
    </div>
</div>

<div class="row p-3 mb-5">
    <div class="col">
        <ul class="nav">
            <li class="nav-item">
                <a style="font-size: 1.02vw;" class="nav-link active" aria-current="page" href="#">Details</a>
            </li>
            <li class="nav-item">
                <a style="font-size: 1.02vw;" class="nav-link text-secondary" href="#">Comment</a>
            </li>
            <li class="nav-item">
                <a style="font-size: 1.02vw;" class="nav-link text-secondary" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a style="font-size: 1.02vw;" class="nav-link text-light disabled">Disabled</a>
            </li>
        </ul>
        <hr class="mt-1 border-dark">
        <h3 class="fw-semibold">Description & Condition</h3>
        <p id="descandcond">{{ $postingans->descandcond }}</p>
        <h3 class="fw-semibold">Location</h3>
        <p id="location">{{ $postingans->location }}</p>
    </div>
</div>

<div class="row p-3 mb-5 d-block">
    <h1 class="mb-3">You may also like</h1>
    <div class="row mx-auto">
        <div class="col-md-2 rounded p-1 mx-0">
            <div class="rounded p-4 shadow" style="cursor: pointer;">
                <img style="width: 19vw; height: 23vh;" class="mb-4 rounded"
                    src="https://www.primefaces.org/primeblocks-vue/images/blocks/ecommerce/productpage/productpage-1-2.png"
                    alt="">
                <h5 class=" fw-semibold mb-1">Product name</h5>
                <h6 class=" mb-4">Subtitle</h6>
                <h6 class=" mb-3">Endauc</h6>
                <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                <h6 class=" fw-semibold m-0">Current offer</h6>
                <hr class=" my-3 mb-2">
                <h6 class=" my-0">Price</h6>
            </div>
        </div>
        <div class="col-md-2 rounded p-1 mx-0">
            <div class="rounded p-4 shadow" style="cursor: pointer;">
                <img style="width: 19vw; height: 23vh;" class="mb-4 rounded"
                    src="https://www.primefaces.org/primeblocks-vue/images/blocks/ecommerce/productpage/productpage-1-2.png"
                    alt="">
                <h5 class=" fw-semibold mb-1">Product name</h5>
                <h6 class=" mb-4">Subtitle</h6>
                <h6 class=" mb-3">Endauc</h6>
                <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                <h6 class=" fw-semibold m-0">Current offer</h6>
                <hr class=" my-3 mb-2">
                <h6 class=" my-0">Price</h6>
            </div>
        </div>
        <div class="col-md-2 rounded p-1 mx-0">
            <div class="rounded p-4 shadow" style="cursor: pointer;">
                <img style="width: 19vw; height: 23vh;" class="mb-4 rounded"
                    src="https://www.primefaces.org/primeblocks-vue/images/blocks/ecommerce/productpage/productpage-1-2.png"
                    alt="">
                <h5 class=" fw-semibold mb-1">Product name</h5>
                <h6 class=" mb-4">Subtitle</h6>
                <h6 class=" mb-3">Endauc</h6>
                <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                <h6 class=" fw-semibold m-0">Current offer</h6>
                <hr class=" my-3 mb-2">
                <h6 class=" my-0">Price</h6>
            </div>
        </div>
        <div class="col-md-2 rounded p-1 mx-0">
            <div class="rounded p-4 shadow" style="cursor: pointer;">
                <img style="width: 19vw; height: 23vh;" class="mb-4 rounded"
                    src="https://www.primefaces.org/primeblocks-vue/images/blocks/ecommerce/productpage/productpage-1-2.png"
                    alt="">
                <h5 class=" fw-semibold mb-1">Product name</h5>
                <h6 class=" mb-4">Subtitle</h6>
                <h6 class=" mb-3">Endauc</h6>
                <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                <h6 class=" fw-semibold m-0">Current offer</h6>
                <hr class=" my-3 mb-2">
                <h6 class=" my-0">Price</h6>
            </div>
        </div>
        <div class="col-md-2 rounded p-1 mx-0">
            <div class="rounded p-4 shadow" style="cursor: pointer;">
                <img style="width: 19vw; height: 23vh;" class="mb-4 rounded"
                    src="https://www.primefaces.org/primeblocks-vue/images/blocks/ecommerce/productpage/productpage-1-2.png"
                    alt="">
                <h5 class=" fw-semibold mb-1">Product name</h5>
                <h6 class=" mb-4">Subtitle</h6>
                <h6 class=" mb-3">Endauc</h6>
                <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                <h6 class=" fw-semibold m-0">Current offer</h6>
                <hr class=" my-3 mb-2">
                <h6 class=" my-0">Price</h6>
            </div>
        </div>
        <div class="col-md-2 rounded p-1 mx-0">
            <div class="rounded p-4 shadow" style="cursor: pointer;">
                <img style="width: 19vw; height: 23vh;" class="mb-4 rounded"
                    src="https://www.primefaces.org/primeblocks-vue/images/blocks/ecommerce/productpage/productpage-1-2.png"
                    alt="">
                <h5 class=" fw-semibold mb-1">Product name</h5>
                <h6 class=" mb-4">Subtitle</h6>
                <h6 class=" mb-3">Endauc</h6>
                <h6 class=" fw-semibold m-0 mb-1">Current offer</h6>
                <h6 class=" fw-semibold m-0">Current offer</h6>
                <hr class=" my-3 mb-2">
                <h6 class=" my-0">Price</h6>
            </div>
        </div>

    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <hr class="border-dark mx-2">
    </div>
</div>


<!-- Footer -->
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
@if (Auth::user()->role == 'admin')
    </form>
@elseif(Auth::user()->role == 'officer')
    </form>
@endif







<!-- Variable for JQuery -->
<input type="hidden" value="{{ $postingans->id }}" id="id">
<input type="hidden" value="{{ $postingans->title }}" id="postingan-title">
<input type="hidden" value="{{ $postingans->subtitle }}" id="postingan-subtitle">
<input type="hidden" value="{{ $postingans->start_price }}" id="postingan-start_price">
<input type="hidden" value="{{ $postingans->endauc }}" id="postingan-endauc">
<input type="hidden" value="{{ $postingans->descandcond }}" id="postingan-descandcond">
<input type="hidden" value="{{ $postingans->location }}" id="postingan-location">
