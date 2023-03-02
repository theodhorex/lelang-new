@extends('home')
@section('content')
    <div class="row shadow rounded">
        <div class="col rounded p-3 px-4">
            <div class="row">
                <div class="col">
                    <h3>This year statistic report</h3>
                </div>
                <div class="col">
                    <div class="dropdown rounded float-end">
                        <a class="btn btn-primary dropdown-toggle fw-semibold rounded" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Export as
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">PDF</a></li>
                            <li><a class="dropdown-item" href="#">XLS</a></li>
                            <li><a class="dropdown-item" href="#">DOCS</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="border-light">
            <div class="wrapper d-block mx-4">
                <canvas id="lineChart" class="mx-auto"></canvas>
            </div>
            <hr class="border-dark mx-3">
            <div class="wrapper mx-3">
                <h3>Description</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto repudiandae perferendis
                    laudantium distinctio accusantium corrupti modi quaerat cum fugiat! Vel consequatur itaque, provident
                    vero
                    alias aperiam quos reiciendis veritatis error dolores nemo quaerat totam possimus? Expedita, doloremque
                    sunt
                    provident nesciunt explicabo quibusdam vitae architecto reiciendis quo perferendis cumque quidem totam
                    obcaecati, incidunt eos fugiat alias aut laudantium mollitia libero, pariatur temporibus? Cupiditate
                    sint
                    ut, placeat praesentium aspernatur exercitationem eius officiis odit aliquam. Aperiam similique
                    voluptatem
                    provident sapiente voluptate nisi sunt error. Consectetur animi obcaecati, optio aut nobis saepe,
                    veniam,
                    tenetur veritatis voluptatibus id maiores impedit esse dolorem nulla at ipsa doloremque accusantium?
                    Modi,
                    numquam. Nobis tenetur totam inventore recusandae sed itaque, temporibus explicabo dolores maxime nam
                    doloremque ratione deleniti commodi nihil ea quos doloribus fugiat corporis? Velit dicta quos modi,
                    optio
                    perspiciatis id placeat cumque consectetur ab porro quidem sunt ullam aspernatur vel deserunt veritatis.
                </p>
            </div>
        </div>
    </div>

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        //line
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        data: [70, 59, 80, 81, 56, 55, 40],
                        backgroundColor: [
                            '#00D1FF',
                        ],
                        borderColor: [
                            '#002B34',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: [
                            '#00E5A1',
                        ],
                        borderColor: [
                            '#003223',
                        ],
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
