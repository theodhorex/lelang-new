<form action="{{ url('/account-update', $user->id) }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ $user->email }}">
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" id="password" class="form-control mb-1">
                    <span class="text-secondary">*leave it blank if you don't want to change the password</span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
