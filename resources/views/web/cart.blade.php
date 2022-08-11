@extends('layouts.site')


@section('content')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="py-4 bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Cart Page</h2>
        </div>
        <!-- container //  -->
    </section>
    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content py-3 border-top">
        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">details</th>
                                        <th scope="col">Quantinty</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="align-middle product">
                                            <th scope="row" class="align-middle">{{ $loop->index + 1 }}</th>
                                            <td class="align-middle">
                                                <figure>
                                                    <img src="{{ $product->firstImage() }}" width="100" height="100" />
                                                </figure>
                                            </td>
                                            <td class="align-middle text-start">
                                                <h5 class="">{{ $product->name }}</h5>
                                                <h6 class="text-muted">{{ $product->short_description }}</h6>

                                            </td>

                                            <td class="align-middle">
                                                <select name="quantity" class="form-select quantity" id="">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </td>
                                            <td class="align-middle price" data-price="{{ $product->price }}">
                                                {{ $product->price . ' ' . App\Models\Setting::get('currency_symbol') }}
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('cart.delete', $product->id) }}" method="POST">
                                                    @csrf

                                                    <button type="submit"
                                                        class="btn btn-outline-danger"><i class="fa fa-trash m-0"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>Summery</h3>
                            <hr>
                            <div class="row">
                                <div class=" d-flex justify-content-between">
                                    <label class="">المنتجات 4</label>
                                    <span class="" id="subTotal">0</span>
                                </div>
                                <div class="col mt-2">
                                    <h5>Shipping</h5>
                                    <select class="form-select shipping-price" name="shipping_method" id="shippingMethod">
                                        <option value="0">free shipping</option>
                                        <option value="15">aramex 15$</option>
                                    </select>
                                </div>

                            </div>
                            <hr>
                            <div class=" d-flex justify-content-between">
                                <span class="">Total Price</span>
                                <span class="" id="totalPrice">0</span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ route('checkout')}}" class="btn btn-outline-primary btn-block">Checkout</a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <main class="col-sm-9">

                    <div class="card">
                        <table class="table table-hover shopping-cart-wrap text-start">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col" class="w-25">Image</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col" >Price</th>
                                    <th scope="col" class="w-25">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="mb-2">
                                        <td>
                                            <figure class="media">
                                                <div class="img-wrap"><img
                                                        src="{{ $product->firstImage() ?? asset('images/image_default.png') }}"
                                                        class="img-thumbnail img-sm"></div>
                                                <figcaption class="media-body ps-3">

                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td>

                                                <h6 class="text-start">Name: {{ $product->name }} </h6>
                                                <h6 class="title text-truncate">Short Description: {{ $product->short_description }} </h6>

                                            </td>
                                            <td>
                                                <select class="form-control">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                            </select>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{ $product->price }}</var>
                                                <small class="text-muted">(USD5 each)</small>
                                            </div>
                                            <!-- price-wrap .// -->
                                        </td>
                                        <td class="text-start">
                                            <a data-original-title="Save to Wishlist" title="" href=""
                                                class="btn btn-outline-success" data-toggle="tooltip"> <i
                                                    class="fa fa-heart"></i></a>
                                            <a href="" class="btn btn-outline-danger"> × Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- card.// -->

                </main>
                <!-- col.// -->
                <aside class="col-sm-3 ">
                    <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE
                        Shipping. </p>
                    <dl class="dlist-align">
                        <dt>Total price:</dt>
                        <dd class="text-right">USD 568</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Discount:</dt>
                        <dd class="text-right">USD 658</dd>
                    </dl>
                    <dl class="dlist-align h4">
                        <dt>Total:</dt>
                        <dd class="text-right"><strong>USD 1,650</strong></dd>
                    </dl>
                    <hr>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="images/icons/pay-visa.png"></aside>
                        <div class="text-wrap small text-muted">
                            Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside"><img src="images/icons/pay-mastercard.png"></aside>
                        <div class="text-wrap small text-muted">
                            Pay by MasterCard and Save 40%.
                            <br> Lorem ipsum dolor
                        </div>
                    </figure>
                    <a href="{{ route('checkout') }}" class="btn btn-success btn-lg btn-block">Proceed To Checkout</a>
                </aside>
                <!-- col.// -->
            </div> --}}

        </div>
        <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection


@push('script')
    <script>
        $(document).ready(function() {

            //// before Checkout  ////
            function getPrice() {
                let subTotal = 0;
                let total = 0;
                let currency = '{{ App\Models\Setting::get('currency_symbol') }}';
                let shippingPrice = 0;

                $('.product').each(function() {
                    let quantity = $(this).find('.quantity').val();
                    let price = $(this).find('.price').data('price');
                    price *= quantity;
                    subTotal = subTotal + price;
                    console.log('quantity: ' + quantity);
                    console.log('price: ' + price);
                    console.log('subTotal: ' + subTotal);

                });
                $('#subTotal').html(subTotal + ' ' + currency);

                shippingPrice = $('#shippingMethod').val();
                shippingPrice = parseInt(shippingPrice);
                total = subTotal + shippingPrice;
                console.log('total', total);
                $('#totalPrice').html(total + ' ' + currency);
            }
            getPrice();

            $('.shipping-price').on('change', function() {

                getPrice();
            })
            $('.quantity').on('change', function() {

                getPrice();
            });



        });
    </script>
@endpush
