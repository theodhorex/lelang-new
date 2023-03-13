@if (Auth::user()->role == 'user')
<input type="hidden" id="postingan_title" name="" value="{{ $messages->postingan->title }}">
@else
<input type="hidden" id="postingan_title" name="" value="{{ $user_reply->postingan->title }}">
@endif
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
{{-- @if (Auth::user()->role == 'user') --}}
@if (Auth::user()->role == 'user')
    <div class="row mx-5 my-2">
        <div class="col">
            <div class="row mb-4">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h3 class="fw-bold">{{ $messages->postingan->title }} | {{ $messages->postingan->category }}</h3>
                        </div>
                    </div>
                    <div class="col d-inline-flex">
                        <h5 class="me-3 text-primary">System</h5>
                        <div style="background-color: #9CA4A6; width: .1vw; height: 2.3vh;" class="rounded me-3"></div>
                        <span class="text-secondary">{{ date('d F Y', strtotime($messages->created_at)) }} at {{ date('H:i', strtotime($messages->created_at)) }}</span>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <p class="fs-5" style="text-align: justify;">
                        {{ $messages->massage }}
                    </p>
                </div>
            </div>
            <div class="row mt-5 mb-4">
                <div class="col">
                    <span class="fw-semibold">{{ \Carbon\Carbon::parse($messages->created_at)->format('d/m/Y') }}</span>
                    <br>
                    <span>Celtic Auction ID</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="row mb-4">
                        <h5 class="py-0 my-0 text-decoration-underline text-primary"><i
                                class="fa fa-reply me-2 me-3 text-dark"></i> Reply</h5>
                    </div>
                    <h4 class="mb-2">Please complete the form below, so we can send the items you have won</h4>
                    <span class="mb-4" style="color: #9CA4A6;">*remember! You can only submit this form once, so make
                        sure
                        the data is correct</span>
                    <form
                        action="{{ Route('inbox-send', ['id' => $messages->postingan->id, 'inbox_id' => $messages->id]) }}"
                        method="post">
                        @csrf
                        <div class="row mb-3 mt-5">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Receipent's name"
                                    id="receipent_name" name="receipent_name" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Phone number" id="phone_number"
                                    name="phone_number" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Address" id="address"
                                    name="address" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Postal code" id="postal_code"
                                    name="postal_code" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"
                                    placeholder="Description *Optional (Like size, color, and so on)"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary fw-semibold">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row mx-5 my-2">
        <div class="col">
            <div class="row mb-4">
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="fw-bold">{{ $user_reply->postingan->title }}</h3>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="d-inline-flex float-end">
                                <h4 class="py-0 my-0"><i class="fa fa-trash me-2 me-3"></i></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col d-inline-flex">
                        <h5 class="me-3 text-primary">System</h5>
                        <div style="background-color: #9CA4A6; width: .1vw; height: 2.3vh;" class="rounded me-3"></div>
                        <span class="text-secondary">{{ date('d F Y', strtotime($user_reply->created_at)) }} at {{ date('H:i', strtotime($user_reply->created_at)) }}</span>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <p class="fs-5" style="text-align: justify;">
                        {{ $user_reply->inbox->massage }}
                    </p>
                </div>
            </div>
            <div class="row mt-5 mb-4">
                <div class="col">
                    <span class="fw-semibold">{{ \Carbon\Carbon::parse($user_reply->created_at)->format('d/m/Y') }}</span>
                    <br>
                    <span>Celtic Auction ID</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <div class="row mb-4">
                        <h5 class="py-0 my-0 fw-semibold"><i
                                class="fa fa-reply me-2 me-3 text-dark mb-4"></i> Replied</h5>
                        <div class="col d-inline-flex">
                            <h5 class="me-3 text-primary">{{ $user_reply->user->name }}</h5>
                            <div style="background-color: #9CA4A6; width: .1vw; height: 2.3vh;" class="rounded me-3">
                            </div>
                            <span class="text-secondary">{{ date('d F Y', strtotime($user_reply->created_at)) }} at {{ date('H:i', strtotime($user_reply->created_at)) }}</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <p class="fs-5" style="text-align: justify;">
                            <b>Receipent Name : </b>{{ $user_reply->receipent_name }}
                        </p>
                        <p class="fs-5" style="text-align: justify;">
                            <b>Address : </b>{{ $user_reply->address }}
                        </p>
                        <p class="fs-5" style="text-align: justify;">
                            <b>Phone Number : </b>{{ $user_reply->phone_number }}
                        </p>
                        <p class="fs-5" style="text-align: justify;">
                            <b>Postal Code : </b>{{ $user_reply->postal_code }}
                        </p>
                        <p class="fs-5" style="text-align: justify;">
                            <b>Description : </b>{{ $user_reply->desc }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- @else
    <div class="row mx-5 my-2">
        <div class="col">
            <div class="row mb-4">
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="fw-bold">{{ $messages->postingan->title }}</h1>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="d-inline-flex float-end">
                                <h4 class="py-0 my-0"><i class="fa fa-trash me-2 me-3"></i></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col d-inline-flex">
                        <h5 class="me-3 text-primary">{{ $user_reply->user->name }}</h5>
                        <div style="background-color: #9CA4A6; width: .1vw; height: 2.3vh;" class="rounded me-3"></div>
                        <span class="text-secondary">{{ $user_reply->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <p class="fs-5" style="text-align: justify;">
                        <b>Receipent Name : </b>{{ $user_reply->receipent_name }}
                    </p>
                    <p class="fs-5" style="text-align: justify;">
                        <b>Address : </b>{{ $user_reply->address }}
                    </p>
                    <p class="fs-5" style="text-align: justify;">
                        <b>Phone Number : </b>{{ $user_reply->phone_number }}
                    </p>
                    <p class="fs-5" style="text-align: justify;">
                        <b>Postal Code : </b>{{ $user_reply->postal_code }}
                    </p>
                    <p class="fs-5" style="text-align: justify;">
                        <b>Description : </b>{{ $user_reply->desc }}
                    </p>
                </div>
            </div>
            <div class="row mt-5 mb-4">
                <div class="col">
                    <span class="fw-semibold">{{ \Carbon\Carbon::parse($messages->created_at)->format('d/m/Y') }}</span>
                    <br>
                    <span>Celtic Auction ID</span>
                </div>
            </div>
        </div>
    </div>
@endif --}}

