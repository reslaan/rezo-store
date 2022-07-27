@extends('layouts.site')


@section('content')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="py-4 bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Product Detail View</h2>
        </div>
        <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row ">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
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
                                            @for($i = 0 ; $i < 3 ; $i++)
                                            <div class="carousel-item {{$i == 0 ? 'active' : ''}} ">
                                                <img src="{{asset('images/image_default.png')}}" class="img-fluid"
                                                     alt="...">
                                            </div>
                                            @endfor
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


                                </article>
                                <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">Original Version of Some product name</h3>

                                    <div class="mb-3">
                                        <var class="price h3 text-warning">
                                            <span class="currency">US $</span><span class="num">1299</span>
                                        </var>
                                    </div>
                                    <!-- price-detail-wrap .// -->
                                    <dl>
                                        <dt>Description</dt>
                                        <dd>
                                            <p>Here goes description consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Model#</dt>
                                        <dd class="col-sm-9">12345611</dd>

                                        <dt class="col-sm-3">Color</dt>
                                        <dd class="col-sm-9">Black and white </dd>

                                        <dt class="col-sm-3">Delivery</dt>
                                        <dd class="col-sm-9">Russia, USA, and Europe </dd>
                                    </dl>
                                        <div class="label-rating">154 orders </div>
                                    <!-- rating-wrap.// -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <dl class="dlist-inline">
                                                <dt>Quantity: </dt>
                                                <dd>
                                                    <select class="form-control form-control-sm" style="width:70px;">
                                                        <option> 1 </option>
                                                        <option> 2 </option>
                                                        <option> 3 </option>
                                                    </select>
                                                </dd>
                                            </dl>
                                            <!-- item-property .// -->
                                        </div>
                                    </div>
                                    <!-- row.// -->
                                    <hr>
                                    <a href="#" class="btn  btn-primary"> Buy now </a>
                                    <a href="#" class="btn  btn-outline-primary"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
                                </article>
                                <!-- card-body.// -->
                            </aside>
                            <!-- col.// -->
                        </div>
                        <!-- row.// -->
                    </div>
                    <!-- card.// -->

                </div>
                <div class="col-md-12">
                    <article class="card mt-4">
                        <div class="card-body">
                            <h4>Detail overview</h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi deserunt mollit anim id est laborum.</p>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteurididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <!-- card-body.// -->
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <!-- ========================= SECTION ITEMS ========================= -->
    <section class="mt-4">
        <div class="container">
            <header class="mb-3">
                <h4 class=" text-uppercase">Related Products</h4>
            </header>
            <div class="row">
                @for($i = 0 ; $i < 3 ; $i++)

                <div class="col-md-4">
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

