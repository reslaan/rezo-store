@extends('layouts.admin',['activePage' =>  $type == 'categories'? 'categories' : 'subcategories'])
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
                                href="{{route('admin.categories',$type)}}">  {{ $type == 'categories'? __('admin/forms.main-categories') : __('admin/forms.sub-categories')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form"> {{ $type == 'categories'? __('admin/forms.new-category') : __('admin/forms.new-subcategory')}} </h4>
                    </div>
                    @include('admin.includes.alerts.alert')

                    <div class="card-body">
                        @include('admin.includes.alerts.alert')
                        <form class="form"
                              action="{{route('admin.new-category',$type)}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> {{__('admin/forms.name')}} </label>
                                            <input type="text" id="name" class="form-control"
                                                   placeholder="{{__('admin/forms.name')}}"
                                                   name="name" value="{{old('name')}}">
                                            @error("name")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    @if($type == 'subcategories')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="parentId"> {{__('admin/forms.main-categories')}} </label>
                                                <select class="form-select" name="parent_id" id="parentId"  aria-label="Default select example" >
                                                    <option value="" disabled selected>{{__('admin/forms.main-categories')}}</option>
                                                    @if($categories &&  $categories -> count() > 0)
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error("parent_id")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif


                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="slug"> {{__('admin/forms.slug')}} </label>
                                            <input type="text" id="slug" class="form-control"
                                                   placeholder="{{__('slug')}}"
                                                   value="{{old('slug')}}" name="slug">
                                            @error("slug")
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="photo" class="form-label"> {{__('admin/forms.photo')}} </label>
                                            <input type="file" id="photo" class="form-control"
                                                   placeholder=""
                                                   value="" name="photo">
                                            @error("photo")
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="toggle-flip form-group mt-1">
                                            <label for="isActive" class="form-check-label ">
                                                {{__('admin/forms.state')}}
                                                <input type="checkbox" id="isActive" value="1"
                                                       name="is_active" ><span
                                                    class="flip-indecator mt-2"  data-toggle-on="{{__('admin/forms.active')}}"
                                                    data-toggle-off={{__('admin/forms.inactive')}}></span>
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
