@extends('layouts.admin',['activePage' =>   'categories'] )
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <main class="app-content">
        <div class="card bg-transparent border-0 mb-3">
            <div class="row ">
                <div class="col-md-6 ">
                    <ul class="breadcrumb py-2 ps-3 mb-0 bg-transparent ">
                        <li class="breadcrumb-item"><a href=""><i class="fa fa-home fa-lg"></i> </a>
                        </li>
                        <li class="breadcrumb-item "><a
                                href="{{route('admin.categories.index')}}">  {{ __('forms.categories') }} </a>
                        </li>
                        <li class="breadcrumb-item "><a
                                href="#" class="link" role="link" aria-disabled="true">  {{ __('forms.edit-category') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form"> {{  __('forms.edit-category') }} </h4>
                    </div>
                    @include('admin.includes.alert')

                    <div class="card-body">
                        <form class="form"
                              action="{{route('admin.categories.update', $category)}}"
                              method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <input name="_method" value="put" type="hidden">
                            <input name="id" value="{{$category->id}}" type="hidden">



                            @include('admin.categories.fields')



                            <div class="  col-md-6 ps-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary w-25">
                                        {{__('forms.update')}}
                                    </button>
                                    <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"> {{__('forms.cancel')}} <i class="fa fa-fw fa-lg fa-times-circle"></i></a>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
