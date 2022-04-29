@extends('layouts.admin',['activePage' => 'products'])
@push('css')
    <link rel="stylesheet"
          href="{{ app()->getLocale() == 'ar' ? asset('assets/css/tail-select-ar.css') :  asset('assets/css/tail-select.css')}}">
@endpush
@section('content')
    <main class="app-content content">

        <div class="card bg-transparent border-0 mb-3">
            <div class="row ">
                <div class="col-md-6 ">
                    <ul class="breadcrumb py-2 ps-3 mb-0 bg-transparent ">
                        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                        <li class="breadcrumb-item"><a href="">{{__('admin/sidebar.home')}} </a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.products.index')}}">  {{__('admin/forms.products')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form"> {{__('admin/forms.new-product')}} </h4>
                    </div>
                    @include('admin.includes.alerts.alert')
                    <div class="card-body">
                        <form class="form" id="form"
                              action="{{route('admin.products.store')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf



                            @include('admin.products.fields')




                            <div class="row gy-2">

                                {{-- submit form--}}
                                <div class="col-md-2 order-md-0">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{__('admin/forms.save')}}
                                        </button>
                                </div>



                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
@section('script')
    <script>

        const all = '{{__("admin/forms.all")}}'
        const none = '{{__("admin/forms.none")}}'
        const empty = '{{__("admin/forms.empty")}}'
        const emptySearch = '{{__("admin/forms.emptySearch")}}'
        const limit = '{{__("admin/forms.limit")}}'
        const placeholder = '{{__("admin/forms.placeholder")}}'
        const placeholderMulti = '{{__("admin/forms.placeholderMulti")}}'
        const search = '{{__("admin/forms.search")}}'
        const disabled = '{{__("admin/forms.disabled")}}'
    </script>

    <script src="{{asset('assets/js/tail-select.js')}}"></script>

    <script>

        tail.select(".multi-select", {
            multiContainer: true,
            disabled: false,
            animate: true,
            multiShowCount: true,
            search: 'search',
            width: '100%',
            multiShowLimit: true,      // [0.5.0]      Boolean
            multiSelectAll: true,
        });
        tail.select('.single-select', {
            width: '100%',
            animate: true,
            deselect: true,

        })


    </script>

@endsection
