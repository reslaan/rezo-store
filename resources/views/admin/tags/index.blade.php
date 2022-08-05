@extends('layouts.admin',['activePage' => 'tags'])
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <main class="app-content">
        <div class="card bg-transparent border-0 mb-3">
            <div class="row ">
                <div class="col-md-6 ">
                    <ul class="breadcrumb py-2 ps-3 mb-0 bg-transparent ">
                        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                        <li class="breadcrumb-item"><a href="">{{__('sidebar.home')}} </a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.tags.index')}}"> {{__('sidebar.tags')}}  </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @include('admin.includes.alert')
        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">{{__('forms.tags')}}</h4>
                <a class="btn btn-primary rounded-pill pb-2" href="{{route('admin.tags.create')}}"><i class="icon fa fa-plus"></i> {{__('sidebar.add-tag')}}</a>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive py-3">
                            <table class="table table-hover table-bordered text-center " id="sampleTable">
                                <thead>
                                <tr>
                                    <th>{{__('forms.name')}}</th>
                                    <th>{{__('forms.slug')}}</th>
                                    <th>{{__('forms.state')}}</th>
                                    <th>{{__('forms.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($tags as $tag)
                                    <tr class=" bg-lighten-5">
                                        <td class="align-middle">{{$tag->name}}</td>
                                        <td class="align-middle w-25">{{$tag->slug}}</td>
                                        <td class="align-middle">

                                                <span class="badge {{($tag->is_active == 0) ? 'badge-danger': 'badge-success' }} "
                                                >{{$tag->active()}}</span>

                                        </td>
                                        <td class="align-middle ">
                                           <span class="badge">
                                                        <a href="{{route('admin.tags.edit',$tag)}}"
                                                           class=" btn btn-sm btn-primary ">
                                                           <i class="fa fa-pen  m-auto text-light"></i>
                                                        </a>
                                                    </span>
                                                <span class="badge">
                                                    <form id="deleteForm_{{$tag->id}}"
                                                          class="deleteForm"
                                                          action="{{route('admin.tags.destroy', $tag->id)}}"                                                          method="post"
                                                          data-name="{{__('forms.tag')}}"
                                                          data-title="{{__('alerts.sure')}}"
                                                          data-text="{{__('alerts.delete_warning')}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" id="deleteBtn" data-ok="{{__('alerts.ok')}}"
                                                           data-cancel="{{__('alerts.cancel')}}"
                                                           data-cancel-success="{{__('alerts.cancel_success')}}"
                                                           data-id="{{$tag->id}}"
                                                           class="btn deleteBtn btn-sm btn-danger ">
                                                            <i class="fa fa-trash  m-auto text-light"></i>
                                                        </a>
                                                    </form>
                                                </span>

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

