@extends('layouts.admin',['activePage' => 'tags'])
@section('title') {{ $pageTitle }} @endsection
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
                                href="{{route('admin.tags.index')}}">  {{__('forms.tags')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form"> {{__('forms.new-tag')}} </h4>
                    </div>
                    @include('admin.includes.alert')
                    <div class="card-body">
                        <form class="form"
                              action="{{route('admin.tags.store')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> {{__('forms.name')}} </label>
                                            <input type="text" id="name" class="form-control"
                                                   placeholder="{{__('name')}}"
                                                   value="{{old('name')}}" name="name">
                                            @error("name")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="slug"> {{__('forms.slug')}} </label>
                                            <input type="text" id="slug" class="form-control"
                                                   placeholder="{{__('slug')}}"
                                                   value="{{old('slug')}}" name="slug">
                                            @error("slug")
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="toggle-flip form-group mt-1">
                                            <label for="isActive" class="form-check-label ">
                                                {{__('forms.state')}}
                                                <input type="checkbox" id="isActive" value="1"
                                                       name="is_active"><span
                                                    class="flip-indecator mt-2"  data-toggle-on="{{__('forms.active')}}"
                                                    data-toggle-off={{__('forms.inactive')}}></span>
                                            </label>
                                            @error("is_active")
                                            <span class="text-danger">{{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 ps-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary w-25">
                                        {{__('forms.save')}}
                                    </button>
                                    <a class="btn btn-secondary" href="{{ route('admin.tags.index') }}"> {{__('forms.cancel')}} <i class="fa fa-fw fa-lg fa-times-circle"></i></a>

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
        $(document).ready(function() {
            $('#name').change(function (e) {
                let name = $(this).val().replace(/ +/g, '-');
                console.log(name)
                let slug = $('#slug');
                slug.val(name) ;
            })
        })
    </script>
@endsection
