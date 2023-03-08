@extends('landing-page.layout.layout')
@section('content')
    <h2 class="fw-semibold mb-5">Let's Start a Converstion.</h2>

    <div class="row">
        <div class="col pe-5">
            <h3 class="fw-semibold mb-4">Ask how we can help you: </h3>
            <div class="text-group mb-5">
                <h5>See our platform in action.</h5>
                <h5 class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero porro error omnis
                    quae
                    ipsa, non, aut cumque dolorum perspiciatis eius qui nostrum accusantium dolorem doloremque.</h5>
            </div>
            <h3 class="fw-semibold mb-4">Points of Contact</h3>
            <div class="text-group mb-5">
                <h4>Earth | Celtic Auction</h4>
                <h5 class="text-secondary">Earth, Milkyway Galaxy, Third Planet.</h5>
            </div>
            <div class="text-group mb-5">
                <h4>Information and Sales</h4>
                <h5 class="text-secondary"><a href="#">celticauction@celtic.com</a></h5>
            </div>
            <div class="text-group mb-5">
                <h4>Support</h4>
                <h5 class="text-secondary"><a href="#">support@celtic.com</a></h5>
            </div>
            <h3 class="fw-semibold mb-4">Additional Office Location</h3>
            <div class="text-group mb-5">
                <h4>Jupiter | Celtic Auction</h4>
                <h5 class="text-secondary">Jupiter, Milkyway Galaxy, Third Planet.</h5>
            </div>
        </div>
        <div class="col">
            <h5 class="text-secondary fw-semibold mb-3">Please note: all fields are required.</h5>
            <div class="mb-3">
                <label for="" class="form-label">First name</label>
                <input type="text" name="" id="" class="form-control">
            </div> 
            <div class="mb-3">
                <label for="" class="form-label">Last name</label>
                <input type="text" name="" id="" class="form-control">
            </div> 
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="" id="" class="form-control">
            </div> 
            <div class="mb-3">
                <label for="" class="form-label">Issue</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
            </div> 
            <div class="row mb-3">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">I'd like to receive more information about Celtic Auction; I understand and agree to the <a href="#">privacy policy</a>.</label>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-lg btn-primary fs-5 fw-semibold text-uppercase w-100">Send Massage</a>
        </div>
    </div>
@endsection
