@extends('layouts.site')


@section('content')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="py-4 bg-dark">
        <div class="container clearfix">
            <h2 class="title-page text-light">Product Detail View</h2>
        </div>
        <!-- container //  -->
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content bg my-4 border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row ">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide"
                                        data-bs-ride="true">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            @foreach ($product->images as $image)
                                                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }} ">
                                                    <figure>
                                                        <img height="300"
                                                            src="{{ asset('storage/images/products/' . $image->file_name) ?? asset('images/image_default.png') }}"
                                                            class="" alt="...">
                                                    </figure>

                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>


                                </article>
                                <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>

                                    <div class="mb-3">
                                        <var class="price h3 text-warning">
                                            <span class="currency">{{ $product->price }}</span>
                                        </var>
                                    </div>
                                    <!-- price-detail-wrap .// -->
                                    <dl>
                                        <dt>Description</dt>
                                        <dd>
                                            <p>{{ $product->short_description }}</p>
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">SKU</dt>
                                        <dd class="col-sm-9">{{ $product->sku }}</dd>

                                        @foreach ($product->attributes as $attribute)
                                            <dt class="col-sm-3">{{ $attribute->name }}</dt>
                                            <dd class="col-sm-9">
                                                <select name="" id="">
                                                    @foreach ($attribute->options as $option)
                                                        <option value="{{ $option->id }}">{{ $option->name }}</option>

                                                    @endforeach
                                                </select>
                                            </dd>
                                        @endforeach

                                    </dl>

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
                                    {{-- <a href="#" class="btn  btn-primary"> Buy now </a> --}}
                                    <a href="#" class="btn  btn-outline-primary addToCart" data-id="{{ $product->id }}"> <i class="fas fa-shopping-cart"></i>
                                        Add to cart </a>
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
                            <p> {{ $product->description }}</p>
                        </div>
                        <!-- card-body.// -->
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <!-- ========================= SECTION ITEMS ========================= -->
    {{-- <section class="mt-4">
        <div class="container">
            <header class="mb-3">
                <h4 class=" text-uppercase">Related Products</h4>
            </header>
            <div class="row">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <figure class="card ">
                            <img src="{{ asset('images/image_default.png') }}" height="250" class="card-img-top"
                                alt="">
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
                                <a href="" class="btn btn-sm btn-primary text-center"><i
                                        class="fa fa-cart-plus fa-3x"></i></a>
                            </div>
                            <!-- bottom-wrap.// -->
                        </figure>
                    </div>
                    <!-- col // -->
                @endfor
            </div>


        </div>
        <!-- container // -->
    </section> --}}
@endsection
