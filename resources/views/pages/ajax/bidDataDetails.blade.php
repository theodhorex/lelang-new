    <div class="row">
        <div class="@if (Auth::user()->role == 'user') col @else col-6 @endif" style="overflow-y: auto;">
            @php
                $i = 1;
            @endphp
            <table class="table table-borderless table-responsive border-light">
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
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;" scope="col">
                            Posted
                        </th>
                        <th style="border: 1px solid #5C5C5C; border-radius: 6px;"
                            class="@if (Auth::user()->role == 'user') d-none @endif" scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bid_data as $bid)
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
                            <td style="border: 1px solid #5C5C5C; border-radius: 6px;">
                                {{ $bid->created_at->diffForHumans() }}
                            </td>
                            <td style="border: 1px solid #5C5C5C; border-radius: 6px;"
                                class="@if (Auth::user()->role == 'user') d-none @endif">
                                <input type="hidden" name="username" id="username" value="{{ $bid->user->name }}">
                                <a href="#" class="btn btn-primary mx-auto" onClick="getWinnerName()" id="select-winner-button"><i class="fa fa-arrow-right"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- <img class="d-block mx-auto"
        src="https://play-lh.googleusercontent.com/sBCKPKALbJlMtGczEfmgTdL5WmbGEx3Sldbgku-wrw1cORAyYciMYN-7or5ufkXAOwiW=w240-h480-rw"
        alt="">
    <h2 class="text-light text-center">Oops! No Data Bro.</h2> -->
        </div>
        @if (Auth::user()->role == 'user')
        @else
            <div class="col-6 p-2 py-0">
                <form action="{{ url('send-message', $postingan_id) }}" method="post">
                    @csrf
                    <div class="rounded p-3 shadow">
                        <div class="form-group mb-3">
                            <label for="winner_name" class="form-label">To: </label>
                            <input type="text" name="winner_name" id="winner_name"
                                class="form-control cursor">
                        </div>
                        <div class="form-group mb-3">
                            <label for="winner_message" class="form-label">Message</label>
                            <textarea name="winner_message" id="winner_message" cols="30" rows="10"
                                class="form-control cursor"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary float-end fw-semibold">Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
