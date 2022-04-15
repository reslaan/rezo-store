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
                        <li class="breadcrumb-item "><a
                                href="{{route('admin.categories',$type)}}">  {{ $type == 'categories'? __('admin/forms.main-categories') : __('admin/forms.sub-categories')}} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @include('admin.includes.alerts.alert')
        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">{{ $type == 'categories'? __('admin/forms.main-categories') : __('admin/forms.sub-categories')}}</h4>
                <a class="btn btn-primary rounded-pill pb-2" href="{{route('admin.new-category',$type)}}">  <i class="me-2 fa fa-plus"></i>{{ $type == 'categories'? __('admin/sidebar.add-category') : __('admin/sidebar.add-subcategory')}}</a>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive py-3">
                            <table class="table table-hover table-bordered text-center " id="sampleTable">
                                <thead>
                                <tr>
                                    <th>{{__('admin/forms.name')}}</th>
                                    @if($type == 'subcategories')
                                        <th>{{__('admin/forms.main-category')}}</th>
                                    @endif
                                    <th>{{__('admin/forms.photo')}}</th>
                                    <th>{{__('admin/forms.slug')}}</th>
                                    <th>{{__('admin/forms.state')}}</th>
                                    <th>{{__('admin/forms.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($categories as $category)
                                    <tr class=" bg-lighten-5">
                                        <td class="align-middle">{{$category->name}}</td>
                                        @if($type == 'subcategories')
                                            <td class="align-middle ">{{$category->parent->name ?? '--'}}</td>
                                        @endif
                                        <td class="align-middle"><img src="" alt=""></td>
                                        <td class="align-middle w-25">{{$category->slug}}</td>
                                        <td class="align-middle">
                                            <div class="row">
                                                <div
                                                    class="col-10 col-sm-8 text-light {{($category->is_active == 0) ? 'bg-secondary': 'bg-primary' }} m-auto fs-5 p-1"
                                                >{{$category->active()}}</div>
                                            </div>
                                        </td>
                                        <td class="align-middle ">
                                            <div class="form-actions row">
                                                <div class="col-lg-5 offset-lg-1 mb-2 mb-lg-0">
                                                    <a href="{{route('admin.edit-category',['type' => $type,'id' => $category->id])}}"
                                                       class=" btn btn-primary p-2  w-100 h-100 d-flex">
                                                        <i class="fa fa-edit fs-5 text-light m-auto"></i>
                                                    </a>
                                                </div>
                                                <div class="col-lg-5 ">
                                                    <form id="deleteForm_{{$category->id}}"
                                                          class="deleteForm"
                                                          action="{{route('admin.delete-category',['type' => $type,'id' => $category->id])}}"
                                                          method="post"
                                                          data-name="{{ $type == 'categories'? __('admin/forms.main-category') : __('admin/forms.sub-category')}}"
                                                          data-title="{{__('alerts.sure')}}"
                                                          data-text="{{__('alerts.delete_warning')}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" id="deleteBtn"
                                                           data-ok="{{__('alerts.ok')}}"
                                                           data-cancel="{{__('alerts.cancel')}}"
                                                           data-cancel-success="{{__('alerts.cancel_success')}}"
                                                           data-id="{{$category->id}}"
                                                           class="btn deleteBtn btn-danger p-2 w-100 h-100 d-flex">
                                                            <i class="fa fa-trash fs-5 m-auto text-light"></i>
                                                        </a>
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

    </main>
@endsection

@section('script')
    <script>
        // function confirmDelete(id){
        //     console.log(id);
        // }
    </script>
    @stop

