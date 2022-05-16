@extends('layouts.admin',['activePage' => 'brands'])

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
                                href="{{route('admin.brands')}}"> {{__('sidebar.brands')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> {{__('forms.new-brand')}} </h4>
                    </div>
                    @include('admin.includes.alerts.alert')
                    <div class="card-body">
                        <form class="form"
                              action="{{route('admin.new-brand')}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> {{__('forms.name')}} </label>
                                            <input type="text" id="name" class="form-control"
                                                   placeholder="Brand Name"
                                                   name="name" value="{{old('name')}}"
                                            >
                                            @error("name")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="photo" class="form-label"> {{__('forms.photo')}} </label>
                                            <input type="file" id="photo" class="form-control"
                                                   placeholder=""
                                                   name="photo">
                                            @error("photo")
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
                                                    class="flip-indecator mt-2 "
                                                    data-toggle-on="{{__('app.active')}}"
                                                    data-toggle-off={{__('app.inactive')}}></span>
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
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
