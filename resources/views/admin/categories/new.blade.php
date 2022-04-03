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
                                <li class="breadcrumb-item"><a href="{{route('admin.categories',$type)}}">  {{ $type == 'categories'? __('الأقسام الرئيسية') : "الأقسام الفرعية"}} </a>
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
                                    <h4 class="card-title" id="basic-layout-form">{{ $type == 'categories'? __('إضافة قسم رئيسي') : __('إضافة قسم فرعي') }} </h4>
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

                                <div class="card-content  collapse show">
                                    @include('admin.includes.alerts.success')
                                    @include('admin.includes.alerts.errors')
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.new-category' , $type)}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name"> الإسم </label>
                                                            <input type="text" id="name" class="form-control"
                                                                   placeholder="Category name"
                                                                    name="name" value="{{old('name')}}"
                                                            >
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                     @if($type == 'subcategories')
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="parentId"> القسم الرئيسي </label>
                                                            <select class="custom-select" name="parent_id" id="parentId"  aria-label="Default select example" >
                                                                <option value="" disabled selected>القسم الرئيسي</option>
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
                                                            <label for="slug"> إسم الرابط </label>
                                                            <input type="text" id="slug" class="form-control"
                                                                   placeholder="slug"
                                                                    name="slug" value="{{old('slug')}}">
                                                            @error("slug")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="photo" class="form-label"> صورة القسم </label>
                                                            <input type="file" id="photo" class="form-control"
                                                                   placeholder=""
                                                                    name="photo">
                                                            @error("photo")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1" name="is_active"
                                                                   id="switcheryColor4" class="switchery"
                                                                   data-color="success"  checked >
                                                            <label for="switcheryColor4" class="card-title ml-1">
                                                                الحالة </label>

                                                            @error("is_active")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-actions">
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
