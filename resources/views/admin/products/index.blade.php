@extends('layouts.admin',['activePage' => 'products'])

@section('content')
    <main class="app-content">
        <div class="card bg-transparent border-0 mb-3">
            <div class="row ">
                <div class="col-md-6 ">
                    <ul class="breadcrumb py-2 ps-3 mb-0 bg-transparent ">
                        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                        <li class="breadcrumb-item"><a href="">{{__('admin/sidebar.home')}} </a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.products.index')}}"> {{__('admin/sidebar.products')}}  </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @include('admin.includes.alerts.alert')
        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">{{__('admin/forms.products')}}</h4>
                <a class="btn btn-primary rounded-pill pb-2" href="{{route('admin.products.create')}}"><i class="icon fa fa-plus"></i> {{__('admin/sidebar.add-product')}}</a>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive py-3">
                            <table class="table table-hover table-bordered text-center " id="sampleTable">
                                <thead>
                                <tr>
                                    <th>{{__('admin/forms.name')}}</th>
                                    <th>{{__('admin/forms.photo')}}</th>
                                    <th>{{__('admin/forms.price')}}</th>
                                    <th>{{__('admin/forms.qty')}}</th>
                                    <th>{{__('admin/forms.state')}}</th>
                                    <th>{{__('admin/forms.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($products as $product)
                                    <tr class=" bg-lighten-5">
                                        <td class="align-middle w-25">{{$product->name}}</td>
                                        <td class="align-middle">{{$product->image ?? '--'}}</td>
                                        <td class="align-middle">{{$product->price}}</td>
                                        <td class="align-middle">{{$product->qty ?? '--'}}</td>
                                        <td class="align-middle">
                                            <div class="row">
                                                <div class="col-8 col-md-6 text-light {{($product->is_active == 0) ? 'bg-secondary': 'bg-primary' }} m-auto fs-5 p-1"
                                                >{{$product->active()}}</div>
                                            </div>
                                        </td>
                                        <td class="align-middle ">
                                            <div class="form-actions row">
                                                <div class="col-lg-5 offset-lg-1 mb-2 mb-lg-0">
                                                    <a href="{{route('admin.products.edit',$product)}}"
                                                       class=" btn btn-primary p-2  w-100 h-100 d-flex">
                                                        <i class="fa fa-edit fs-5 text-light m-auto"></i>
                                                    </a>
                                                </div>
                                                <div class="col-lg-5 ">
                                                    <form id="deleteForm_{{$product->id}}"
                                                          class="deleteForm"
                                                          action="{{route('admin.products.destroy', $product->id)}}"                                                          method="post"
                                                          data-name="{{__('admin/forms.product')}}"
                                                          data-title="{{__('alerts.sure')}}"
                                                          data-text="{{__('alerts.delete_warning')}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" id="deleteBtn" data-ok="{{__('alerts.ok')}}"
                                                           data-cancel="{{__('alerts.cancel')}}"
                                                           data-cancel-success="{{__('alerts.cancel_success')}}"
                                                           data-id="{{$product->id}}"
                                                           class="btn deleteBtn btn-danger p-2 w-100 h-100 d-flex">
                                                            <i class="fa fa-trash fs-5 m-auto text-light"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

