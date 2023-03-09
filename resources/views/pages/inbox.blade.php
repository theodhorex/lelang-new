@extends('home')
@section('content')
    <h2 class="fw-semibold mb-3">Inbox</h2>
    @if (Auth::user()->role == 'user')
        @foreach ($get_message as $message)
            <div class="row rounded p-3 mb-3 shadow" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onClick="getInboxDetails({{ $message->id }})">
                <div class="col">
                    <h5 class="d-flex my-0 py-0" style="cursor: pointer">
                        <input type="checkbox" name="" id="" class="form-check-input m-0 p-0 me-2">
                        System
                        <div class="mx-4 rounded" style="background-color: #9CA4A6; width: .2vw; height: 2.3vh;"></div>
                        <p class="py-0 my-0 cursor-pointer">
                            <b>{{ $message->postingan->title }} || {{ $message->postingan->category }}</b> -
                            {{ Str::limit($message->massage, 50) }}
                        </p>
                    </h5>
                </div>
                <div class="col">
                    <p class="my-0 py-0 float-end"> {{ $message->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
    @else
        @foreach ($get_message as $message)
            <div class="row rounded p-3 mb-3 shadow">
                <div class="col">
                    <h5 class="d-flex my-0 py-0" style="cursor: pointer">
                        <input type="checkbox" name="" id="" class="form-check-input m-0 p-0 me-2">
                        {{ $message->user->name }}
                        <div class="mx-4 rounded" style="background-color: #9CA4A6; width: .2vw; height: 2.3vh;"></div>
                        <p class="py-0 my-0 cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onClick="getInboxDetails({{ $message->id }})">
                            <b>{{ $message->postingan->title }} || {{ $message->postingan->category }}</b>
                        </p>
                    </h5>
                </div>
                <div class="col">
                    <p class="my-0 py-0 float-end"> {{ $message->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
    @endif

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
        function getInboxDetails(id) {
            $.get("{{ url('/inbox-details') }}/" + id, {}, function(data, status) {
                $("#imported-inbox-details").html(data);
                $('#exampleModalLabel').html($('#postingan_title').val());
                $("#exampleModal").show();
            });
        }
    </script>
@endsection
