
<div class="card">
    <div class="card-header pb-0"><h4>Orders</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive py-3">
                    <table class="table table-hover table-bordered text-center " >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('order number')}}</th>
                            <th>{{__('order total')}}</th>
                            <th>{{__('order status')}}</th>
                            <th>{{__('payment status')}}</th>
                            <th>{{__('order date')}}</th>
                            <th>{{__('forms.details')}}</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        @isset($orders)
                            @foreach($orders as $order)

                                    <tr class=" bg-lighten-5">
                                        <td class="align-middle">{{$loop->index + 1}}</td>
                                        <td class="align-middle">{{$order->order_number}}</td>
                                        <td class="align-middle ">{{$order->total}}</td>
                                        <td class="align-middle"><span class="badge badge-warning">{{$order->status}}</span></td>
                                        <td class="align-middle">{{$order->payment_status}}</td>
                                        <td class="align-middle">{{$order->created_at}}</td>

                                        <td class="align-middle ">
                                            <span class="badge">
                                                <a href="{{route('order.items',$order->id)}}"
                                                   class=" btn btn-sm btn-primary ">
                                                   <i class="fa fa-eye  m-auto text-light"></i>
                                                </a>
                                            </span>

                                        </td>
                                    </tr>


                            @endforeach

                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

