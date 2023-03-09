@extends('landing-page.layout.layout')
@section('content')
    <div class="row mb-5">
        <div class="col-6">
            <h1 class="fw-semibold mb-0" style="font-size: 3.5vw;">Celtic Auction</h1>
            <h2 class="fw-semibold">Find your <b class="text-primary">dream</b> item here.</h2>
            <br>
            <p style="font-size: .9vw;" class="mb-4 text-secondary">Lorem ipsum, dolor sit amet consectetur
                adipisicing elit. Dolorem,
                assumenda! Reprehenderit
                odit dolore aliquam doloremque aspernatur soluta iste voluptates amet voluptatibus, atque
                consequuntur modi perspiciatis esse ut ipsam neque quas vitae numquam vel! Doloribus,
                voluptatum. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo,
                necessitatibus!</p>
            <p style="font-size: .9vw;" class="mb-4 text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Eligendi nihil molestiae possimus! Aspernatur, culpa quos aliquam dolorum quasi debitis dolor id doloribus,
                autem, accusantium blanditiis? Beatae quam dolorum alias et repudiandae! Laborum sint id delectus, nulla
                velit magni aliquam voluptas sunt neque non, quae vitae. Ab voluptatum nam sapiente at?</p>
            <div class="row">
                <div class="col">
                    <div>
                        <a href="{{ url('/landing-page/contact-us') }}" class="btn btn-primary fw-semibold">Contact us</a>
                        <a href="{{ url('/landing-page/about-us') }}"
                            class="btn btn-transparent shadow fw-semibold ms-3">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <img class="float-end" src="{{ asset('asset/landing-page-main.png') }}" alt="Landing page image, upcoming!">
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="row mb-5">
        <h3 class="fw-semibold text-center">_Recommended by</h3>
        <p class="text-secondary mb-5 text-center text-capitalize">here are some sponsors who support our company</p>
        <div class="col d-flex align-items-center justify-content-center">
            <a href="https://about.google/"><img class="mx-3"
                    src="https://www.freepnglogos.com/uploads/google-logo-png/google-logo-icon-png-transparent-background-osteopathy-16.png"
                    alt="google" style="width: 8vw;"></a>
            <a
                href="https://www.amazon.com/?&tag=googleglobalp-20&ref=pd_sl_7nnedyywlk_e&adgrpid=82342659060&hvpone=&hvptwo=&hvadid=585475370855&hvpos=&hvnetw=g&hvrand=12222921705326446397&hvqmt=e&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9117983&hvtargid=kwd-10573980&hydadcr=2246_13468515&gclid=CjwKCAiA3pugBhAwEiwAWFzwdclNNByuOUlrJ9yQZsHc-Nbs2xpgvSu_0omvMjtvAxKlMiJCl2sa3hoCkqgQAvD_BwE">
                <img class="mx-3"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png"
                    alt="amazon" style="width: 8vw;">
            </a>
            <a href="https://www.marlboro.id/">
                <img class="mx-3" src="https://cdn.freebiesupply.com/logos/thumbs/2x/marlboro-logo.png" alt="marlboro"
                    style="width: 8vw;">
            </a>
            <a href="https://www.sampoernacareer.id/">
                <img class="mx-3" src="{{ asset('asset/sampoerna.png') }}" alt="sampoerna" style="width: 8vw;">
            </a>
            <a href="https://www.djarum.com/home#sec-1">
                <img class="mx-3" src="http://depopipa.co.id/wp-content/uploads/2016/01/DJARUM.png" alt="djarum"
                    style="width: 8vw;">
            </a>
            <a href="https://www.gudanggaramtbk.com/">
                <img class="mx-3" src="{{ asset('asset/gudang-garam.png') }}" alt="gudang garam" style="width: 8vw;">
            </a>
        </div>
    </div>
    <div class="row mb-5">
        <h3 class="fw-semibold text-center">_Our customer</h3>
        <p class="text-secondary mb-5 text-center">Here are some customers who have shopped using our
            application</p>
        <div class="col">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img style="height: 25.5vh;"
                            src="https://asset.kompas.com/crops/Nzd8Wg_VyGH8dM9CI4J1fqIupco=/0x0:3159x2106/750x500/data/photo/2021/05/02/608eb6854cbba.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-semibold">Jeff Bezos</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img style="height: 25.5vh;"
                            src="https://pbs.twimg.com/profile_images/1163911054788833282/AcA2LnWL_400x400.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-semibold">Laravel</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img style="height: 25.5vh;" src="https://static.dezeen.com/uploads/2019/04/ikea-logo-new-sq-1.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-semibold">Ikea</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img style="height: 25.5vh;"
                            src="https://i.pinimg.com/736x/48/e6/b8/48e6b860efa0e6256cb8d7579e843124.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title fw-semibold">Mac Donald</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <h1 class="text-center fw-semibold mb-3">_About us</h1>
        <p class="p-4">Lorem ipsum <b>dolor sit amet consectetur adipisicing elit</b>. Nam natus nemo
            reprehenderit a in sapiente
            doloribus ut ab laudantium quibusdam aliquid pariatur debitis dolorem maiores, voluptates quo illo
            nostrum velit quisquam fugiat quod? Deleniti similique voluptatibus nostrum magnam accusamus
            adipisci, nulla illum provident, alias nesciunt vitae et quod quaerat laudantium officia commodi
            veritatis est! Alias, inventore. <b>Culpa molestias quam hic libero</b> expedita cupiditate minus
            repudiandae, fuga dicta? Fugiat quos magnam iste, in excepturi dicta officia! Blanditiis quos
            architecto delectus commodi voluptate ratione beatae omnis labore modi, earum culpa? Atque a
            deleniti quod illo laudantium! <b>Ullam quo vel maxime animi ipsa alias</b>. Neque itaque cumque
            dolore
            quas praesentium temporibus, labore perferendis iure iusto placeat veniam nihil unde facilis eveniet
            quam est officia fugiat et laudantium? Sint cum unde ratione suscipit exercitationem commodi, ullam
            reiciendis deserunt inventore ducimus, <b>obcaecati nihil! Vitae, quo reiciendis nulla</b> nemo ab
            doloribus doloremque recusandae, porro molestiae beatae consequatur distinctio voluptatibus quidem.
            Neque optio rem cumque aut voluptatibus? Harum doloremque illo pariatur magnam possimus consectetur
            soluta optio autem et a? Ex amet soluta corporis. Saepe sit, ratione similique itaque ea
            consequuntur eveniet, aliquam vitae eum quidem accusantium mollitia at fugit dignissimos nulla
            consequatur qui odit! <b>Debitis ullam dolore itaque natus!</b> Mollitia nemo, cum assumenda
            accusamus
            repellendus soluta placeat nisi est vitae veniam. Autem magni, voluptatum laborum eum facilis
            repellat? Soluta id vitae delectus cupiditate voluptate, consequuntur ad repellat mollitia ratione
            magni obcaecati facilis quia laboriosam quaerat aut commodi hic exercitationem quam quibusdam quis
            eos et adipisci rerum? Qui.</p>
        <div class="col">
            <div class="row">
                <div class="col p-3 pe-5 float-start">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="770" height="510" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=semarang&t=&z=16&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://2yu.co">2yu</a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 510px;
                                    width: 770px;
                                }
                            </style><a href="https://embedgooglemap.2yu.co">html embed google map</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 510px;
                                    width: 770px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <div class="col py-4">
                    <h1 class="fw-semibold mb-4">Where we are based now & there <b class="text-primary">Map</b>
                        details.</h1>
                    <p class="text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Asperiores sit ratione, cum omnis facere ullam aut temporibus consequuntur fugiat sequi?
                        Aliquid voluptate molestiae laboriosam, perferendis iste, quo veniam a, cupiditate nulla
                        ipsam rem. Facere similique quis esse asperiores optio illo, dolorem repellat harum
                        vitae placeat nam architecto quam praesentium adipisci sapiente, ipsam hic in officia
                        blanditiis minus dolor eaque. Nam reprehenderit dolores, dolore nemo quaerat ullam
                        reiciendis blanditiis maiores, quidem esse temporibus commodi, odit sint!</p>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, nesciunt rem
                        explicabo molestiae qui laboriosam nisi eaque facere et possimus corrupti nulla
                        doloribus laborum ab molestias optio sapiente, illo deserunt, quos consequuntur nostrum?
                        Accusantium, saepe.
                    </p>
                    <div class="row">
                        <div class="col">
                            <h1 class="fw-bold text-warning mb-0">15+</h1>
                            <h4 class="fw-semibold mt-0">Partner</h4>
                        </div>
                        <div class="col">
                            <h1 class="fw-bold text-primary mb-0">30+</h1>
                            <h4 class="fw-semibold mt-0">Sponsors</h4>
                        </div>
                        <div class="col">
                            <h1 class="fw-bold text-danger mb-0">350+</h1>
                            <h4 class="fw-semibold mt-0">Item</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row mb-5">
        <div class="col-6">
            <div class="d-flex justify-content-center">
                <div style="border-left: 4px solid black; height: 45vh;" class="rounded"></div>
                <h1 class="fw-semibold w-50 ms-5">The Reason You <b class="text-primary">Should</b> Choose Us.
                </h1>
            </div>
        </div>
        <div class="col-6">
            <div class="row mb-5">
                <div class="col px-4">
                    <h2><i class="fa fa-check-circle-o text-primary"></i></h2>
                    <h3 class="fw-semibold mb-3">Certified Platform</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nostrum tempora itaque
                        aliquam adipisci quasi amet expedita sapiente cumque odit?</p>
                </div>
                <div class="col px-4">
                    <h2><i class="fa fa-clock-o text-info"></i></h2>
                    <h3 class="fw-semibold mb-3">Customer Support</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nostrum tempora itaque
                        aliquam adipisci quasi amet expedita sapiente cumque odit?</p>
                </div>
            </div>
            <div class="row">
                <div class="col px-4">
                    <h2><i class="fa fa-shield text-danger"></i></h2>
                    <h3 class="fw-semibold mb-3">High Security</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nostrum tempora itaque
                        aliquam adipisci quasi amet expedita sapiente cumque odit?</p>
                </div>
                <div class="col px-4">
                    <h2><i class="fa fa-money text-warning"></i></h2>
                    <h3 class="fw-semibold mb-3">Friendly Budget</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nostrum tempora itaque
                        aliquam adipisci quasi amet expedita sapiente cumque odit?</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5 bg-primary rounded p-4 py-5">
        <div class="col">
            <img src="{{ asset('asset/get-started.png') }}" style="width: 15vw;" class="d-block mx-auto mb-4"
                alt="">
            <h4 style="color: rgba(255, 255, 255, 0.452);" class="text-center">Ready to colaborate?</h4>
            <h1 class="text-light text-center fw-semibold mb-4">Start Bidding Your Dream Items!</h1>
            <div class="d-flex align-items-center justify-content-center">
                <a href="{{ url('/login') }}" class="btn btn-light fw-semibold px-5 text-primary">Get Started</a>
            </div>
        </div>
    </div>
@endsection
