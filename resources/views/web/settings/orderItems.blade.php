@extends('layouts.site',['activePage' => 'settings'])

@section('title') {{ $pageTitle }} @endsection

@section('content')
<div class="container">


<div class="card  my-5">
    <div class="card-header pb-0"><h4>items</h4></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive py-3">
                    <table class="table table-hover table-bitemed text-center " >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('item name')}}</th>
                            <th>{{__('item quantity')}}</th>
                            <th>{{__('item price')}}</th>
                            <th>{{__('item date')}}</th>

                        </tr>
                        </thead>
                        <tbody class="">
                        @isset($items)
                            @foreach($items as $item)

                                    <tr class=" bg-lighten-5">
                                        <td class="align-middle">{{$loop->index + 1}}</td>
                                        <td class="align-middle">{{$item->product->name}}</td>
                                        <td class="align-middle">{{$item->quantity}}</td>
                                        <td class="align-middle ">{{$item->price}}</td>
                                        <td class="align-middle ">{{$item->created_at}}</td>
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
</div>
@endsection
