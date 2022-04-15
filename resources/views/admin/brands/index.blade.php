@extends('layouts.admin',['activePage' => 'brands'])

@section('content')
    <main class="app-content ">

        <div class="card bg-transparent border-0 mb-3">
            <div class="row ">
                <div class="col-md-6 ">
                    <ul class="breadcrumb py-2 ps-3 mb-0 bg-transparent ">
                        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                        <li class="breadcrumb-item"><a href="">{{__('admin/sidebar.home')}} </a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.brands')}}"> {{__('admin/sidebar.brands')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Basic form layout section start -->

        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">{{__('admin/sidebar.brands')}}</h4>
                <a class="btn btn-primary rounded-pill pb-2" href="{{route('admin.new-brand')}}"><i class="icon fa fa-plus"></i> {{__('admin/sidebar.add-brand')}}</a>
            </div>
            @include('admin.includes.alerts.alert')
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive py-3">
                            <table class="table table-hover table-bordered text-center"
                                   id="sampleTable">
                                <thead>
                                <tr>
                                    <th>{{__('admin/forms.name')}}</th>
                                    <th>{{__('admin/forms.photo')}}</th>
                                    <th>{{__('admin/forms.state')}}</th>
                                    <th>{{__('admin/forms.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($brands as $brand)
                                    <tr class=" bg-lighten-5 ">
                                        <td class="align-middle">{{$brand->name}}</td>
                                        <td class="w-25  align-middle">
                                            <img src="{{$brand->photoPath()}}" alt=""
                                                 class="img-fluid  w-50" width="200"
                                                 height="200">
                                        </td>
                                        <td class="align-middle">
                                            <div class="row">
                                                 <div class="col-8 col-md-6 text-light {{($brand->is_active == 0) ? 'bg-secondary': 'bg-primary' }} m-auto fs-5 p-1"
                                                 >{{$brand->active()}}</div>
                                            </div>
                                           </td>
                                        <td class="align-middle w-25">
                                            <div class="form-actions row ">
                                                <div class="col-lg-5 offset-lg-1 mb-2 mb-lg-0">
                                                    <a href="{{route('admin.edit-brand',['id' => $brand->id])}}"
                                                       class=" btn btn-primary p-2  w-100 h-100 d-flex">
                                                        <i class="fa fa-edit fs-5 text-light m-auto"></i>
                                                    </a></div>
                                                <div class="col-lg-5">
                                                    <form id="deleteForm_{{$brand->id}}"
                                                          class="deleteForm"
                                                          action="{{route('admin.delete-brand',['id' => $brand->id])}}"                                                          method="post"
                                                          data-name="{{__('admin/forms.brand')}}"
                                                          data-title="{{__('alerts.sure')}}"
                                                          data-text="{{__('alerts.delete_warning')}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" id="deleteBtn" data-ok="{{__('alerts.ok')}}"
                                                           data-cancel="{{__('alerts.cancel')}}"
                                                           data-cancel-success="{{__('alerts.cancel_success')}}"
                                                           data-id="{{$brand->id}}"
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

