@extends('layouts.admin',['activePage' =>   'categories' ])
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
                    </ul>
                </div>
            </div>
        </div>

        @include('admin.includes.alert')
        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">{{  __('forms.categories')}}</h4>
                <a class="btn btn-primary rounded-pill pb-2" href="{{route('admin.categories.create')}}"> <i
                        class="me-2 fa fa-plus"></i>{{  __('sidebar.add-category')}}</a>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive py-3">
                            <table class="table table-hover table-bordered text-center " id="sampleTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('forms.name')}}</th>
                                    <th>{{__('forms.main-category')}}</th>
                                    <th>{{__('forms.slug')}}</th>
                                    <th class="text-center"> Featured</th>
                                    <th class="text-center"> Menu</th>
                                    <th>{{__('forms.state')}}</th>
                                    <th>{{__('forms.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @if($categories)
                                    @foreach($categories as $category)
                                        @if ($category->id != 1)
                                            <tr class=" bg-lighten-5">
                                                <td class="align-middle">{{$loop->index + 1}}</td>
                                                <td class="align-middle">{{$category->name}}</td>
                                                <td class="align-middle ">{{$category->parent->name ?? '--'}}</td>
                                                <td class="align-middle">{{$category->slug}}</td>
                                                <td class="align-middle">
                                                    <span
                                                        class="badge {{ $category->featured == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $category->featured == 1 ? 'Yes' : 'No' }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <span
                                                        class="badge {{ $category->menu == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $category->menu == 1 ? 'Yes' : 'No' }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <span
                                                        class="badge {{ $category->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">
                                                        {{$category->active()}}
                                                    </span>
                                                </td>
                                                <td class="align-middle ">
                                                    <span class="badge">
                                                        <a href="{{route('admin.categories.edit',$category)}}"
                                                           class=" btn btn-sm btn-primary ">
                                                           <i class="fa fa-pen  m-auto text-light"></i>
                                                        </a>
                                                    </span>
                                                    <span class="badge">
                                                        <form id="deleteForm_{{$category->id}}"
                                                              class="deleteForm"
                                                              action="{{route('admin.categories.destroy',$category)}}"
                                                              method="post"
                                                              data-name="{{  __('forms.main-category')}}"
                                                              data-title="{{__('alerts.sure')}}"
                                                              data-text="{{__('alerts.delete_warning')}}">
                                                           @csrf
                                                            @method('delete')
                                                         <a href="#" id="deleteBtn"
                                                            data-ok="{{__('alerts.ok')}}"
                                                            data-cancel="{{__('alerts.cancel')}}"
                                                            data-cancel-success="{{__('alerts.cancel_success')}}"
                                                            data-id="{{$category->id}}"
                                                            class="btn deleteBtn btn-sm btn-danger ">
                                                            <i class="fa fa-trash  m-auto text-light"></i>
                                                         </a>
                                                    </form>
                                                  </span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@push('script')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush

