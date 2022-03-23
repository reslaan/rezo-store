@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{__('admin/sidebar.home')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> {{__('admin/sidebar.settings')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> {{__('admin/sidebar.shipping-methods')}} </a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> تعديل وسيلة التوصيل </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('update.shipping.methods')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input name="_method" value="put" type="hidden">
                                            <input name="id" value="{{$shipping->id}}" type="hidden">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="value"> الإسم </label>
                                                            <input type="text" id="value"  class="form-control" placeholder="{{$shipping->value}}" value="{{$shipping->value}}"  name="value">
                                                            @error("value")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="plainValue"> قيمة التوصيل </label>
                                                            <input type="number" id="plainValue" class="form-control" placeholder="{{is_null( $shipping->plain_value) ? 0 : $shipping->plain_value}}" value="{{ !is_null( $shipping->plain_value) ? $shipping->plain_value : 0 }}" name="plain_value">
                                                            @error("plain_value")
                                                            <span class="text-danger"> هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="form-group mt-1">--}}
{{--                                                            <input type="checkbox" value="1"   name="" id="switcheryColor4" class="switchery" data-color="success" checked>--}}
{{--                                                            <label for="switcheryColor4" class="card-title ml-1"> الحالة </label>--}}

{{--                                                            @error("category.0.active")--}}
{{--                                                            <span class="text-danger"> </span>--}}
{{--                                                            @enderror--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>


                                            <div class="form-actions">
{{--                                                <button type="button" class="btn btn-warning mr-1"--}}
{{--                                                        onclick="history.back();">--}}
{{--                                                    <i class="ft-x"></i> تراجع--}}
{{--                                                </button>--}}
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
