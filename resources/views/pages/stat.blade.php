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
                            <li><a class="dropdown-item" href="{{ url('export-pdf-stat') }}">PDF</a></li>
                            <li><a class="dropdown-item" href="#">XLS</a></li>
                            <li><a class="dropdown-item" href="#">DOCS</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="border-light">
            <div class="wrapper d-block mx-4">
                {{-- <canvas id="lineChart" class="mx-auto"></canvas> --}}
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
            <div class="row mx-3">
                @php
                    $i = 1;
                @endphp
                <h3 mb-2 mt-4>Data table</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->start_price }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                            '#00d0ff61',
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
