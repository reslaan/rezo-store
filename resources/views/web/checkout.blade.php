@extends('layouts.site')


@section('content')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="py-4 bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Checkout</h2>
        </div>
        <!-- container //  -->
    </section>
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="content-section py-4">
        <div class="container">
            <form action="{{route('checkout.place.order')}}" method="post">
                @csrf
            <div class="row">

                    <div class="col-md-8">
                        <div class="card">

                            <article class="card-body">

                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>العنوان </label>
                                        <input type="text" name="address" class="form-control" placeholder="">
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <!-- form-group end.// -->
                                </div>
                                <!-- form-row end.// -->

                        </div>
                        <!-- card.// -->
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">

                                    <article class="card-body">

                                        <dl class="d-flex justify-content-between m-0">
                                            <dt class="h5">الإجمالي:</dt>
                                            <dt class="text-start h5 b">
                                                {{ $totalPrice . ' ' . App\Models\Setting::get('currency_symbol') }} </dt>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Shipment Type</h4>
                                    </header>
                                    <article class="card-body">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping_method"
                                                value="0">
                                            <span class="form-check-label">
                                                aramex
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping_method"
                                                value="15">
                                            <span class="form-check-label">
                                                DHL
                                            </span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="shipping_method"
                                                value="25">
                                            <span class="form-check-label">
                                                SMSA
                                            </span>
                                        </label>
                                    </article>
                                </div>
                            </div>
                            <input type="hidden" name="total_price" value="{{$totalPrice}}" />

                            <div class="col-md-12 mt-4">
                                <button class="subscribe btn btn-success btn-lg btn-block" type="submit">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>

            </div>
        </form>
        </div>
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
