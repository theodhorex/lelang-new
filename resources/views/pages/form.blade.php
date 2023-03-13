@extends('home')
@section('content')
<style>
.border-dashed {
    border-style: dashed;
}

.remove-focus:focus {
    outline: none;
    box-shadow: none;
    color: black;
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
    <div class="col rounded p-3 px-4 shadow">
        <h4 class="text-dark fw-semibold">Item Information</h4>
        <span class="text-secondary">Fill out a few details to start posting your item.</span>
        <form action="{{ url('/form-send') }}" id="post-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="item-photo mt-4">
                <h6 class="text-secondary text-uppercase">Photo</h6>
                <hr class="border-dark">
                <div class="row p-3 mx-1 rounded" style="border: 1px solid grey; border-style: dashed;">
                    <div id="img-div" class="col-4 d-inline-flex">
                        <!-- <div class="bg-light rounded" style="width: 4vw; height: 8vh;"></div> -->
                        <!-- <img id="imagePreview"
                            style="width: 4vw; height: 8vh; border: 1px solid grey; border-style: dashed; border-radius: 10%; color: white;"
                            src="" alt="Your preview"> -->
                        <!-- <span class="text-light my-auto ms-4">Upload your photos here. Max size 2MB</span> -->
                        <i id="removed" class="fa fa-file-image-o my-auto me-3"
                            style="font-size: 1.7vw; color: #363636;" aria-hidden="true"></i>
                        <span id="removedd" class="my-auto" style="color: #363636">Upload your photos here.</span>
                    </div>
                    <div class="col-8 float-end d-block my-auto">
                        <label class="float-end rounded p-2 fw-semibold text-secondary" for="uploadFile"
                            style="cursor: pointer; border: 1px solid #363636;">Browse</label>
                        <input type="file" accept="image/*" name="uploadFile" id="uploadFile" value="upload"
                            class="uploadFile d-none" multiple>
                    </div>
                </div>
            </div>
            <div class="description mt-5">
                <h6 class="text-secondary text-uppercase">Description</h6>
                <hr class="border-dark">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="title" class="text-secondary form-label">Title</label>
                            <input id="title" type="text"
                                class="form-control remove-focus bg-transparent cursor"
                                name="title" required autofocus placeholder="Title">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="subtitle" class="text-secondary form-label">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle"
                                class="form-control remove-focus cursor" required
                                autofocus placeholder="Subtitle">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="text-secondary form-label">Category</label>
                            <select name="category" id=""
                                class="form-control remove-focus bg-transparent placeholder cursor">
                                <option class="dropdown-item" value="Art">Art</option>
                                <option class="dropdown-item" value="Building">Building</option>
                                <option class="dropdown-item" value="Automotive">Automotive</option>
                                <option class="dropdown-item" value="Electronic">Electronic</option>
                                <option class="dropdown-item" value="Music">Music</option>
                                <option class="dropdown-item" value="Vintage">Vintage</option>
                                <option class="dropdown-item" value="Photography">Photography</option>
                                <option class="dropdown-item" value="Baby & Kids">Baby & Kids</option>
                                <option class="dropdown-item" value="Toys">Toys</option>
                                <option class="dropdown-item" value="Furniture">Furniture</option>
                                <option class="dropdown-item" value="Cloth">Cloth</option>
                                <option class="dropdown-item" value="Pant">Pant</option>
                                <option class="dropdown-item" value="Sneaker">Sneaker</option>
                                <option class="dropdown-item" value="Accecories">Accecories</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="location" class="text-secondary form-label">Location</label>
                            <input type="text" name="location" id="location"
                                class="form-control remove-focus cursor" required
                                autofocus placeholder="Your location">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="endauc" class="form-label text-secondary">End auction</label>
                            <input type="date" name="endauc" id="endauc"
                                class="form-control remove-focus cursor" required
                                autofocus>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="startprice" class="text-secondary form-label">Start price</label>
                    <input type="text" name="startprice" id="startprice"
                        class="form-control remove-focus cursor" required
                        autofocus placeholder="Start price">
                </div>
                <div class="mb-3">
                    <label for="descandcond" class="text-secondary form-label">Description & Condition</label>
                    <!-- <input type="text" name="descandcond" id="descandcond"
                        class="form-control remove-focus bg-transparent placeholder text-light cursor" required
                        autofocus placeholder="Description & Condition"> -->
                    <textarea name="descandcond" id="descandcond" cols="30" rows="10"
                        class="form-control remove-focus cursor" required
                        autofocus placeholder="Description & Condition"></textarea>
                </div>
            </div>
        </form>
        <a href="#" id="post-form-button" class="btn btn-primary mt-3"
            onClick="document.getElementById('post-form').submit()" role="button">Post</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="imported-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
<script>
$(document).ready(function() {
    $("#uploadFile").change(function() {
        var file = this.files;
        var output = $('#img-div');
        output.html("");
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                output.append(`<img id="imagePreview" style="width: 4vw; height: 8vh; border-radius: 10%; color: white;"
                            src="${event.target.result}" alt="Your preview">`);
                $('#removed').remove();
                $('#removedd').remove();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
@endsection