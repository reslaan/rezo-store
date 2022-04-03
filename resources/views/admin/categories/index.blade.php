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
                                    <h4 class="card-title" id="basic-layout-form">{{ $type == 'categories'? __('عرض الأقسام الرئيسية') : "عرض الأقسام الفرعية"}} </h4>
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center mb-0" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th>الإسم</th>
                                                @if($type == 'subcategories')
                                                <th>القسم الرئيسي</th>
                                                @endif
                                                <th>صورة القسم</th>
                                                <th>إسم الرابط</th>
                                                <th>الحالة</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr class=" bg-lighten-5">
                                                    <td>{{$category->name}}</td>
                                                    @if($type == 'subcategories')
                                                    <td>{{$category->parent->name}}</td>
                                                    @endif
                                                    <td><img src="" alt=""></td>
                                                    <td>{{$category->slug}}</td>
                                                    <td>{{$category->active()}}</td>
                                                    <td>
                                                        <div class="form-actions row ">
                                                                <div class="col-lg-6"><a href="{{route('admin.edit-category',['type' => $type,'id' => $category->id])}}"  class=" btn btn-warning  w-100 h-100 d-flex">
                                                                        <i class="ft-edit m-auto"></i>
                                                                    </a></div>
                                                                <div class="col-lg-6">
                                                                    <form action="{{route('admin.delete-category',['type' => $type,'id' => $category->id])}}" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn  btn-danger w-100 h-100 mt-1 mt-lg-0">
                                                                            <i class="la la-remove"></i>
                                                                        </button>
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
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
