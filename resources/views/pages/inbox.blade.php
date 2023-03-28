@extends('home')
@section('content')
    @csrf
    <h2 class="fw-semibold mb-3">
        Inbox</h2>
    <hr>
    @if (session('success'))
        <div class="row">
            <div class="col">
                <div class="alert alert-info" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-6">
            {{-- <div class="form-group">
                <label for="" class="form-label">Status</label>
                <select name="" id="status_filter" class="form-control">
                    <option class="text-dark dropdown-item" disabled selected>-- Status --</option>
                    <option class="text-dark dropdown-item" value="y">Readed</option>
                    <option class="text-dark dropdown-item" value="n">Unread</option>
                </select>
            </div> --}}

            {{-- <div class="form-group">
                <label for="" class="form-label">Search</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search message here..." aria-label="Username"
                        aria-describedby="addon-wrapping">
                </div>
            </div> --}}
        </div>
    </div>

    <form action="{{ url('inbox-multiple-delete') }}" method="POST" id="form-delete">
        @csrf
        @if (Auth::user()->role != 'user')
            @if ($get_message->count() > 0)
                <div class="row mb-3">
                    <div class="col">
                        <div class="d-flex">
                            <h5 for="" class="form-label fw-semibold me-3">Check All <input type="checkbox"
                                    name="" id="checkbox_inbox" class="ms-2 my-auto form-check-input"></h5>
                            <h5 for="" class="form-label fw-semibold d-none" id="trash_button"><button
                                    type="submit"><i class="fa fa-trash"></button></i>
                            </h5>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <div class="row mb-5">
            <div class="col mx-2">
                @if (Auth::user()->role == 'user')
                    @foreach ($get_message as $message)
                        <div class="row rounded p-3 mb-3 shadow">
                            <div class="col">
                                <h5 class="d-flex my-0 py-0" style="cursor: pointer">
                                    {{-- <input type="checkbox" name="item_ids[]" value="{{ $message->id }}"
                                        class="form-check-input m-0 p-0 me-2 lolss"> --}}
                                    System
                                    <div class="mx-4 rounded"
                                        style="background-color: #9CA4A6; width: .2vw; height: 2.3vh;">
                                    </div>
                                    <p class="py-0 my-0 cursor-pointer" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onClick="getInboxDetails({{ $message->id }})">
                                        <b>{{ $message->postingan->title }} || {{ $message->postingan->category }}</b> -
                                        {{ Str::limit($message->massage, 50) }}
                                    </p>
                                </h5>
                            </div>
                            <div class="col">
                                <p class="float-end ms-3 my-0 py-0">
                                    <b>
                                        @if ($message->isReplies)
                                            Replied
                                        @else
                                            Unreplied
                                        @endif
                                    </b>
                                </p>
                                <p class="my-0 py-0 float-end"> {{ $message->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($get_message as $message)
                        <div class="row rounded p-3 mb-3 shadow">
                            <div class="col">
                                <h5 class="d-flex my-0 py-0" style="cursor: pointer">
                                    <input type="checkbox" name="item_ids[]" value="{{ $message->id }}"
                                        class="form-check-input m-0 p-0 me-2 lolss">
                                    {{ $message->user->name }}
                                    <div class="mx-4 rounded"
                                        style="background-color: #9CA4A6; width: .2vw; height: 2.3vh;">
                                    </div>
                                    <p class="py-0 my-0 cursor-pointer" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" onClick="getInboxDetails({{ $message->inbox->id }})">
                                        <b>{{ $message->postingan->title }} || {{ $message->postingan->category }}</b>
                                    </p>
                                </h5>
                            </div>
                            <div class="col">
                                <p class="my-0 py-0 float-end mx-2"><a href="{{ url('inbox-delete', $message->id) }}"
                                        class="text-dark"><i class="fa fa-trash"></i></a></p>
                                <p class="my-0 py-0 float-end mx-2">
                                    @if ($message->inbox->is_reply == 'y')
                                        Readed
                                    @else
                                        Unread
                                    @endif
                                </p>
                                <p class="my-0 py-0 float-end mx-2"> {{ $message->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
    </form>
    </div>
    </div>

    <div class="modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
        role="dialog" style="z-index: 1400;">
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h1 class="modal-title fs-5 mx-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imported-inbox-details" style="overflow-y: auto; overflow-x: hidden;"></div>
                </div>
                <div id="modal-footer" class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#trash_button').click(function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete selected inbox?')) {
                    var form = $('#form-delete');
                    var url = form.attr('action');
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: form.serialize(),
                        success: function() {
                            location.reload();
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    });
                }

            });
            $('.lolss').click(function() {
                if ($(this).is(':checked')) {
                    $('#trash_button').removeClass('d-none');
                } else {
                    $('#trash_button').addClass('d-none');
                }
            });
        });

        function getInboxDetails(id) {
            $.get("{{ url('/inbox-details') }}/" + id, {}, function(data, status) {
                $("#imported-inbox-details").html(data);
                $('#exampleModalLabel').html($('#postingan_title').val());
                $("#exampleModal").show();
            });
        }

        $('#checkbox_inbox').change(function() {
            if ($(this).is(':checked')) {
                $('#trash_button').removeClass('d-none');
                $('.lolss').prop('checked', true)
            } else {
                $('#trash_button').addClass('d-none');
                $('.lolss').prop('checked', false)
            }
        });

        $('#status_filter').change(function() {
            console.log('lol')
        });
    </script>
@endsection
