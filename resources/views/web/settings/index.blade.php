@extends('layouts.site',['activePage' => 'settings'])

@section('title') {{ $pageTitle }} @endsection

@section('content')
    <div class="container mb-5">

        @include('admin.includes.alert')
        <div class="row user">
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab">Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active"  id="profile">
                        @include('web.settings.includes.profile')
                    </div>
                    <div class="tab-pane "  id="orders">
                        @include('web.settings.includes.orders')
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
