@extends('layouts.site')


@section('content')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="py-4 bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">{{ $category->name .' Category' }}</h2>
        </div>
        <!-- container //  -->
    </section>

    <section class="section-content bg padding-y">
        <div class="container">

            <div class="row ">
                <main class="col-sm-9 py-2">
                    @foreach($category->products as $product)
                    <article class="card card-product my-2">
                        <div class="card-body">
                            <div class="row">
                                <aside class="col-sm-3">
                                    <div class="img-wrap"><img class="img-fluid" src="{{asset('images/image_default.png')}}"></div>
                                </aside>
                                <!-- col.// -->
                                <article class="col-sm-6">
                                    <h4 class="title"> {{$product->name}} </h4>

                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>
                                    <div class="fw-bold text-primary">154 orders </div>
                                </article>
                                <!-- col.// -->
                                <aside class="col-sm-3 border-left">
                                    <div class="action-wrap">
                                        <div class="price-wrap h4">
                                            <span class="text-primary"> $56 </span>
                                            <del class="text-danger"> $98</del>
                                        </div>
                                        <!-- info-price-detail // -->
                                        <p class="text-success">Free shipping</p>
                                        <br>
                                        <p>
                                            <a href="#" class="btn btn-primary"> Buy now </a>
                                            <a href="#" class="btn btn-secondary"> Details  </a>
                                        </p>
                                    </div>
                                    <!-- action-wrap.// -->
                                </aside>
                                <!-- col.// -->
                            </div>
                            <!-- row.// -->
                        </div>
                        <!-- card-body .// -->
                    </article>
                    <!-- card product .// -->
                        @endforeach

                </main>
                <!-- col.// -->
            </div>

        </div>
        <!-- container .//  -->
    </section>

@endsection

