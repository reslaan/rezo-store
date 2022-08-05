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
                        <li class="breadcrumb-item"><a href="">{{__('sidebar.home')}} </a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.products.index')}}">  {{__('forms.products')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
@include('admin.includes.alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form"> {{__('forms.new-product')}} </h4>
                    </div>
                    <div class="card-body">
                        <form class="form" id="form"
                              action="{{route('admin.products.store')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf



                            @include('admin.products.includes.fields')




                            <div class="row gy-2">

                                {{-- submit form--}}
                                <div class="col-md-4 order-md-0">
                                        <button type="submit" class="btn btn-primary w-50">
                                            {{__('forms.save')}}
                                        </button>
                                    <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"> {{__('forms.cancel')}} <i class="fa fa-fw fa-lg fa-times-circle"></i></a>

                                </div>



                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
@push('script')
    <script>

        const all = '{{__("forms.all")}}'
        const none = '{{__("forms.none")}}'
        const empty = '{{__("forms.empty")}}'
        const emptySearch = '{{__("forms.emptySearch")}}'
        const limit = '{{__("forms.limit")}}'
        const placeholder = '{{__("forms.placeholder")}}'
        const placeholderMulti = '{{__("forms.placeholderMulti")}}'
        const search = '{{__("forms.search")}}'
        const disabled = '{{__("forms.disabled")}}'
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

@endpush
