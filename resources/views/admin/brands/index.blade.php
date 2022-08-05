@extends('layouts.admin',['activePage' => 'brands'])
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <main class="app-content ">

        <div class="card bg-transparent border-0 mb-3">
            <div class="row ">
                <div class="col-md-6 ">
                    <ul class="breadcrumb py-2 ps-3 mb-0 bg-transparent ">
                        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                        <li class="breadcrumb-item"><a href="">{{__('sidebar.home')}} </a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.brands.index')}}"> {{__('sidebar.brands')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Basic form layout section start -->

        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">{{__('sidebar.brands')}}</h4>
                <a class="btn btn-primary rounded-pill pb-2" href="{{route('admin.brands.create')}}"><i class="icon fa fa-plus"></i> {{__('sidebar.add-brand')}}</a>
            </div>
            @include('admin.includes.alert')
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive py-3">
                            <table class="table table-hover table-bordered text-center"
                                   id="sampleTable">
                                <thead>
                                <tr>
                                    <th>{{__('forms.name')}}</th>
                                    <th>{{__('forms.photo')}}</th>
                                    <th>{{__('forms.state')}}</th>
                                    <th>{{__('forms.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($brands as $brand)
                                    <tr class=" bg-lighten-5 ">
                                        <td class="align-middle">{{$brand->name}}</td>
                                        <td class="w-25 align-middle">
                                            <img src="{{$brand->photoPath()}}" alt=""
                                                 class="img-fluid  w-50" width="200"
                                                 height="200">
                                        </td>
                                        <td class="w-25 align-middle">
                                           <span class="badge {{ $brand->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">
                                                        {{$brand->active()}}
                                                    </span>
                                           </td>

                                        <td class="align-middle ">
                                                    <span class="badge">
                                                        <a href="{{route('admin.brands.edit',$brand)}}"
                                                           class=" btn btn-sm btn-primary ">
                                                           <i class="fa fa-pen  m-auto text-light"></i>
                                                        </a>
                                                    </span>
                                            <span class="badge">
                                                        <form id="deleteForm_{{$brand->id}}"
                                                              class="deleteForm"
                                                              action="{{route('admin.brands.destroy',$brand)}}"
                                                              method="post"
                                                              data-name="{{  __('forms.brand')}}"
                                                              data-title="{{__('alerts.sure')}}"
                                                              data-text="{{__('alerts.delete_warning')}}">
                                                           @csrf
                                                            @method('delete')
                                                         <a href="#" id="deleteBtn"
                                                            data-ok="{{__('alerts.ok')}}"
                                                            data-cancel="{{__('alerts.cancel')}}"
                                                            data-cancel-success="{{__('alerts.cancel_success')}}"
                                                            data-id="{{$brand->id}}"
                                                            class="btn deleteBtn btn-sm btn-danger ">
                                                            <i class="fa fa-trash  m-auto text-light"></i>
                                                         </a>
                                                    </form>
                                                  </span>
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

