@extends('layouts.site')


@section('content')
    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="py-4 bg-dark">
        <div class="container clearfix">
            <h2 class="title-page text-light">Cart Page</h2>
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
                                            <input type="hidden" class="product-id" name=""
                                                value="{{ $product->id }}" />
                                            <td class="align-middle text-start">
                                                <h5 class="">{{ $product->name }}</h5>
                                                <h6 class="text-muted">{{ $product->short_description }}</h6>
                                            </td>



                                            <td class="align-middle">
                                                <select name="quantity" class="form-select quantity" id="">
                                                    {{-- <option value="{{$product->cartQuantity()}}">{{$product->cartQuantity()}}</option> --}}
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <option {{$product->cartQuantity() == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                                    @endfor
{{--
                                                    <option {{ $product->cartQuantity() == 2 ? 'selected' : '' }}
                                                        value="2">2</option>
                                                    <option {{ $product->cartQuantity() == 3 ? 'selected' : '' }}
                                                        value="3">3</option>
                                                    <option {{ $product->cartQuantity() == 4 ? 'selected' : '' }}
                                                        value="4">4</option> --}}
                                                </select>
                                            </td>
                                            <td class="align-middle price" data-price="{{ $product->price }}">
                                                {{ $product->price . ' ' . App\Models\Setting::get('currency_symbol') }}
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('cart.delete', $product->id) }}" method="POST">
                                                    @csrf

                                                    <button type="submit" class="btn btn-outline-danger"><i
                                                            class="fa fa-trash m-0"></i></button>
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
                            <div class="row h-100">
                                <div class=" d-flex justify-content-between">
                                    <label class="">المنتجات 4</label>
                                    <span class="" id="subTotal">0</span>
                                </div>

                            </div>
                            <hr>
                            <div class=" d-flex justify-content-between">
                                <span class="">الإجمالي</span>
                                <span class="" id="totalPrice">0</span>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ route('checkout') }}" id="checkout"
                                        class="btn btn-outline-primary btn-block">Checkout</a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>


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

                total = subTotal;
                console.log('total', total);
                $('#totalPrice').html(total + ' ' + currency);

            }
            getPrice();


            $('.quantity').on('change', function() {
                getPrice();
                let product_id = $(this).parents('.product').find('.product-id').val();
                let quantity = $(this).val();
                console.log("quantity:" + quantity);
                console.log("product_id:" + product_id);

                $.ajax({
                    url: '{{ route('quantity.update') }}',
                    type: 'post',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    success: function(response) {

                        console.log(response.cart);

                    },
                    error: function(response) {
                        console.log(response);

                        let errorMessage = response.responseJSON.message;
                        $.notify(
                            `<p class="text-light mb-0 text-center fs-5"> ${errorMessage} <i class="fa fa-xing ms-2"></i></p>`, {
                                type: 'danger',
                            });
                    },

                });
            });



        });
    </script>
@endpush
