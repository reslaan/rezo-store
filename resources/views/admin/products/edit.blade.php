@extends('layouts.admin',['activePage' => 'products'])
@push('css')
    <link rel="stylesheet"
          href="{{ app()->getLocale() == 'ar' ? asset('assets/css/tail-select-ar.css') :  asset('assets/css/tail-select.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/dropzone/bootstrap.min.css')}}">

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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0" id="basic-layout-form"><i
                                class="fa fa-edit"></i> {{__('forms.edit-product')}} </h4>
                        <a class="btn btn-primary rounded-pill pb-2" href="{{route('admin.products.create')}}"><i
                                class="icon fa fa-plus"></i> {{__('sidebar.add-product')}}</a>
                    </div>
                    @include('admin.includes.alert')
                    <div class="card-body">
                        <form class="form"
                              action="{{route('admin.products.update',$product)}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <input name="_method" value="put" type="hidden">
                            <input name="id" value="{{$product->id}}" type="hidden">

                            @include('admin.products.includes.fields')


                            <div class="row gy-2">

                                {{-- show option fields--}}
                                <div class="col-xl-2 col-lg-3 col-md-4 order-md-1 ps-md-0 px-lg-0">
                                    <button type="button" id="showFields" class="btn btn-primary w-100 "
                                            data-bs-toggle="modal" data-bs-target="#extraFields">
                                        <i class="fa fa-sliders-h pe-1"></i>
                                        <span>{{__('forms.product_options')}}</span>
                                    </button>

                                </div>

                                {{--  update product--}}
                                <div class="col-md-3 col-lg-2 order-md-0">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{__('forms.update')}}
                                    </button>
                                </div>

                            </div>


                        </form>


                            @include('admin.products.option-modal')


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
    <script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>


    <script>

        tail.select(".multi-select", {
            multiContainer: true,
            disabled: false,
            animate: true,
            multiShowCount: true,
            search: 'search',
            deselect: false,
            width: '100%',
            multiShowLimit: true,      // [0.5.0]      Boolean
            multiSelectAll: true,
        });

        tail.select('.single-select', {
            width: '100%',
            animate: true,
            deselect: false,

        })
    </script>

    @yield('option-script')

    <script type="text/javascript">

        // upload multiple images by dropzone
        let uploadedDocumentMap = {}
        Dropzone.options.photos =
            {
                paramName: 'dzProductImages',
                url: '{{route('admin.product.images.save')}}',
                method: 'POST',
                maxFilesize: 5,
                parallelUploads: 1,
                clickable: true,
                dictRemoveFile: "{{__('forms.delete_image')}}",
                headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}",
                    'id': '{{$product->id}}'
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                init: function () {
                    myDropzone = this;

                    $.ajax({
                        url: '{{route('admin.product.images.show')}}',
                        type: 'post',
                        data: {
                            id: '{{$product->id}}',
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN':
                                "{{ csrf_token() }}",
                        },
                        success: function (response) {

                            $.each(response, function (key, value) {
                                var mockFile = {name: value.name, size: value.size};

                                myDropzone.emit("addedfile", mockFile);
                                myDropzone.emit("thumbnail", mockFile, value.path);
                                myDropzone.emit("complete", mockFile);
                                uploadedDocumentMap[mockFile.name] = value.name;
                            });

                        },
                    });
                },
                success: function (file, response) {
                    if (response.failed) {
                        file.previewElement.remove();
                        $.notify(`<p class="text-light mb-0 text-center fs-5"> ${response.failed} <i class="fa fa-xing ms-2"></i></p>`, {
                            type: 'danger',
                        });
                    } else if (response.name) {
                        uploadedDocumentMap[file.name] = response.name;
                    }
                },
                error: function (file, response) {
                    file.previewElement.remove()
                    $.notify(`<p class="text-light mb-0 text-center fs-5"> ${response} <i class="fa fa-xing ms-2"></i></p>`, {
                        type: 'danger',
                    });
                    return false;
                },
                removedfile: function (file) {

                    let fileName = uploadedDocumentMap[file.name];
                    if (fileName) {
                        deleteImage(fileName);
                        file.previewElement.remove()
                    } else {
                        file.previewElement.remove()
                    }
                }
            };

        function deleteImage(fileName) {
            $.ajax({
                type: 'POST',
                url: '{{route('admin.image.delete')}}',
                data: {
                    name: fileName,
                    id: '{{$product->id}}',
                },
                headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}",

                },
                success: function (response) {
                    $.notify(`<p class="text-light mb-0 text-center fs-5"> ${response.message} <i class="fa fa-check ms-2"></i></p>`, {
                        // type: primary, info , success, warning, danger, dark, light, secondary
                        type: response.type,
                    });

                }
            })
        }
    </script>
@endpush
