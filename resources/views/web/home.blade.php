@extends('layouts.site')


@section('content')
    <!-- ========================= SECTION MAIN ========================= -->
    <section class="slider mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!-- ================= main slide ================= -->
                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active ">
                                <img src="{{asset('images/image_default.png')}}" class="" height="400" width="800"
                                     alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/image_default.png')}}" class="" height="400" width="800"
                                     alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/image_default.png')}}" class="" height="400" width="800"
                                     alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- ============== main slidesow .end // ============= -->
                </div>
                <!-- col.// -->
                <div class="col-md-3">
                    @for($i = 0 ; $i < 3 ; $i++)
                        <div class="card mt-2 mb-2">
                            <figure class="d-flex justify-content-center align-items-center">
                                <div class="w-25 p-2">
                                    <img src="{{asset('images/image_default.png')}}" class=" img-fluid" alt="">
                                </div>
                                <figcaption class="p-3 w-75">
                                    <h6 class="title"><a href="#"> منتج عينة</a></h6>
                                    <div class="fw-bold">
                                        <span class="text-primary">$1280</span>
                                        <del class="text-danger">$1980</del>
                                    </div>
                                    <!-- price-wrap.// -->
                                </figcaption>
                            </figure>
                        </div>
                    @endfor
                </div>
                <!-- col.// -->
            </div>
        </div>
        <!-- container .//  -->
    </section>
    <!-- ========================= SECTION MAIN END// ========================= -->
    <!-- ========================= Blog ========================= -->
    <section class="mt-4 ">
        <div class="container">
            <header class="mb-3">
                <h4 class="">Featured Categories</h4>
            </header>
            <div class="row">
                @foreach($categories as $category)

                <div class="col-md-4">
                        <div class="card-banner d-flex"
                             style="height:250px; background-image: url({{asset('images/image_default.png')}});">
                            <article class="m-auto">
                                <div class="text-center">
                                    <h5 class="card-title">{{$category->name}}</h5>
                                    <a href="#" class="btn btn-warning btn-sm">{{__('sidebar.all')}} </a>
                                </div>
                            </article>
                        </div>
                        <!-- card.// -->
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ========================= Blog .END// ========================= -->

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="mt-4">
        <div class="container">

            <header class="mb-3">
                <h4 class="">FEATURED PRODUCTS</h4>
            </header>
            <div class="row">
                @for($i = 0 ; $i < 3 ; $i++)

                    <div class="col-md-4">

                        <div class="card" >
                            <a href="">
                                <img src="{{asset('images/image_default.png')}}" height="250" class="card-img-top" alt="" >
                            </a>
                            <div class="card-body ">
                                <h5 class="card-title">Another name of item</h5>
                                <p class="card-text">Some small description goes here.</p>
                                <p>154 orders</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="fw-bold">
                                    <span class="text-primary">$1280</span>
                                    <del class="text-danger">$1980</del>
                                </div>
                                <a href="" class="btn btn-sm btn-primary "><i class="fa fa-cart-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- col // -->
                @endfor
            </div>
            <!-- row.// -->

        </div>
        <!-- container .//  -->
    </section>

    <!-- ========================= SECTION ITEMS ========================= -->
    <section class="mt-4">
        <div class="container">
            <header class="mb-3">
                <h4 class=" text-uppercase">Recently Added</h4>
            </header>
            <div class="row">
                @for($i = 0 ; $i < 8 ; $i++)

                <div class="col-md-3">
                    <figure class="card ">
                        <img src="{{asset('images/image_default.png')}}" height="250" class="card-img-top" alt="">
                        <figcaption class="p-2">
                            <h4 class="title">Another name of item</h4>
                            <p class="desc">Some small description goes here</p>

                                <div class="label-rating">154 orders</div>
                            <!-- rating-wrap.// -->
                        </figcaption>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="fw-bold">
                                <span class="text-primary">$1280</span>
                                <del class="text-danger">$1980</del>
                            </div>
                            <a href="" class="btn btn-sm btn-primary text-center"><i class="fa fa-cart-plus fa-3x"></i></a>
                        </div>
                        <!-- bottom-wrap.// -->
                    </figure>
                </div>
                <!-- col // -->
                    @endfor
            </div>


        </div>
        <!-- container // -->
    </section>

@endsection

