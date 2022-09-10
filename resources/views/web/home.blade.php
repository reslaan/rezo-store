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
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" class="" height="400"
                                    width="800" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cHJvZHVjdHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" class="" height="400"
                                    width="800" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1494232410401-ad00d5433cfa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" class="" height="400"
                                    width="800" alt="...">
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
                    @isset($products)
                        @foreach ($products as $product)
                            @if ($loop->index < 3)
                                <div class="card mt-2 mb-2">
                                    <figure class="d-flex justify-content-center align-items-center">
                                        <div class="w-50 p-2">
                                            <img src="{{ $product->firstImage() ?? asset('images/image_default.png') }}"
                                                class=" img-fluid" alt="">
                                        </div>
                                        <figcaption class="p-3 w-75">
                                            <h6 class="title"><a class="nav-link"
                                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h6>
                                            <div class="fw-bold">
                                                <span
                                                    class="text-primary">{{ $product->price . ' ' . \App\Models\Setting::get('currency_symbol') }}</span>
                                                <del class="text-danger"></del>
                                            </div>
                                            <!-- price-wrap.// -->
                                        </figcaption>
                                    </figure>
                                </div>
                            @endif
                        @endforeach
                    @endisset

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
                <h4 class="">{{ __('app.featured_categories') }}</h4>
            </header>
            <hr>
            <div class="row">
                @isset($categories)
                    @foreach ($categories as $category)
                        <div class="col-md-4">
                            {{-- <figure class="mt-2" style="width: 120px; height: auto;"> --}}
                            {{-- <img src="{{ $category->photoPath() }}" id="categoryImage" class="img-fluid" alt="img"> --}}
                            {{-- </figure> --}}
                            <div class="card-banner d-flex"
                                style="height:250px; background-image: url({{ $category->photoPath() }}); background-size: cover;">
                                <article class="m-auto">
                                    <div class="text-center">
                                        <h5 class="card-title">{{ $category->name }}</h5>
                                        <a href="#" class="btn btn-warning btn-sm">{{ __('sidebar.all') }} </a>
                                    </div>
                                </article>
                            </div>
                            <!-- card.// -->
                        </div>
                    @endforeach
                @endisset


            </div>
        </div>
    </section>
    <!-- ========================= Blog .END// ========================= -->

    <!-- ========================= SECTION CONTENT ========================= -->


    <!-- ========================= SECTION ITEMS ========================= -->
    <section class="mt-4">
        <div class="container">
            <header class="mb-3">
                <h4 class=" text-uppercase">{{ __('app.recently_added') }}</h4>
            </header>
            <hr>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">

                @isset($products)
                    @foreach ($products as $product)
                        <div class="col">
                            <figure class="card  ">
                                <a href="{{ route('product.show', $product->slug) }}" class="nav-link p-0">
                                    <img src="{{ $product->firstImage() ?? asset('images/image_default.png') }}" height="200"
                                        class="card-img-top border-top border-primary border-2" alt="">
                                    <figcaption class="p-2">
                                        <h4 class="title">{{ $product->name }}</h4>
                                        <p class="desc text-nowrap overflow-hidden">{{ $product->short_description }}</p>
                                        <!-- rating-wrap.// -->
                                    </figcaption>
                                </a>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <div class="fw-bold">
                                        <span
                                            class="text-primary">{{ $product->price . ' ' . Config::get('settings.currency_symbol') }}</span>
                                        {{-- <del class="text-danger">1980 {{ \App\Models\Setting::get('currency_symbol') }}</del> --}}
                                    </div>
                                    <a href="#" class="btn btn-sm btn-primary text-center addToCart"
                                        data-id="{{ $product->id }}"><i class="fa fa-cart-plus fa-3x"></i></a>
                                </div>
                                <!-- bottom-wrap.// -->
                            </figure>
                        </div>
                        <!-- col // -->
                    @endforeach
                @endisset

            </div>


        </div>
        <!-- container // -->
    </section>
@endsection

{{-- <script type="text/javascript">

        $(document).on('click','.addToCart',function (e) {

            e.preventDefault();

            let id = $(this).data('id');

                        $.ajax({
                            url: '{{ route('cart.add') }}',
                            type: 'post',
                            data: {
                                id: id,
                            },
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                console.log(response.message);

                            },
                            error: function(response) {
                                console.log(response);
                            },
                        });
        });

    </script> --}}
