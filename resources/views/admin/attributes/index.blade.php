@extends('layouts.admin',['activePage' =>   'attributes' ])
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
                                href="{{route('admin.attributes.index')}}">  {{ __('forms.attributes') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @include('admin.includes.alert')

        <details class="card mb-2" open>
            <summary class="card-header ">{{  __('forms.new-attribute') }} </summary>
            <div class="card-body">
                <form class="form"
                      action="{{route('admin.attributes.store')}}"
                      method="post"
                >
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="name"> {{__('forms.name')}} </label>
                                <input type="text" id="name" class="form-control"
                                       placeholder="{{__('مثال: اللون, الحجم, الوزن ...')}}"
                                       name="name" value="{{$attribute->name ?? old('name')}}">
                                @error("name")
                                <span class="text-danger error" data-error-message="{{$message}}"></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 align-self-center">
                            <button type="submit" class="btn btn-primary w-100  mt-3">
                                {{__('forms.save')}}
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>
                            </button>
                        </div>
                    </div>


                </form>
            </div>

        </details>
        <div class="card">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">{{  __('forms.attributes')}}</h4>
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
                                    <th>{{__('forms.update')}}</th>
                                    <th>{{__('forms.delete')}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @if($attributes)
                                    @foreach($attributes as $attribute)

                                        <tr class=" bg-lighten-5">
                                            <td class="align-middle">{{$loop->index + 1}}</td>

                                            <form
                                                action="{{ route('admin.attributes.update', $attribute)  }}"
                                                method="post">
                                                @csrf
                                                <td class="align-middle">
                                                    <input name="_method" value="put" type="hidden">
                                                    <input name="id" value="{{$attribute->id}}" type="hidden">
                                                    <input type="text" id="name" class="form-control  text-center"
                                                           name="name" value="{{$attribute->name}}">
                                                    @error("name")
                                                    <span class="text-danger error" data-error-message="{{$message}}"></span>
                                                    @enderror
                                                </td>
                                                <td class="align-middle ">
                                                        <span class="badge">
                                                        <button type="submit"
                                                                class=" btn btn-sm btn-primary ">
                                                            <i class="fa fa-pen  m-auto text-light"></i>
                                                          </button>
                                                  </span>
                                                </td>
                                            </form>


                                            <td class="align-middle ">


                                                <span class="badge">
                                                <form id="deleteForm_{{$attribute->id}}"
                                                      class="deleteForm"
                                                      action="{{route('admin.attributes.destroy',$attribute)}}"
                                                      method="post"
                                                      data-name="{{  __('forms.attribute')}}"
                                                      data-title="{{__('alerts.sure')}}"
                                                      data-text="{{__('alerts.delete_warning')}}">
                                                        @csrf
                                                    @method('delete')
                                                        <a href="#" id="deleteBtn"
                                                           data-ok="{{__('alerts.ok')}}"
                                                           data-cancel="{{__('alerts.cancel')}}"
                                                           data-cancel-success="{{__('alerts.cancel_success')}}"
                                                           data-id="{{$attribute->id}}"
                                                           class="btn deleteBtn btn-sm btn-danger ">
                                                            <i class="fa fa-trash  m-auto text-light"></i>
                                                        </a>
                                                    </form>
                                            </span>
                                            </td>
                                        </tr>

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
    <script type="text/javascript">
        $('#sampleTable').DataTable();

        let errorMessage = $('.error').data('error-message');
        $('document').ready(function(){
            if (errorMessage){
                $.notify(`<p class="text-light mb-0 text-center fs-5"> ${errorMessage} <i class="fa fa-check ms-2"></i></p>`,{
                    // type: primary, info , success, warning, danger, dark, light, secondary
                    type: 'danger',
                });
            }
        });

    </script>
@endpush

