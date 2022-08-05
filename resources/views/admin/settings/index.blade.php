@extends('layouts.admin',['activePage' => 'settings'])

@section('title') {{ $pageTitle }} @endsection

@section('content')
    <div class="app-content text-start">
        <div class="card bg-transparent border-0 mb-3">
            <div class="row ">
                <div class="col-md-6 ">
                    <ul class="breadcrumb py-2 ps-3 mb-0 bg-transparent ">
                        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('sidebar.home')}} </a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.products.index')}}"> {{ $pageTitle}}  </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @include('admin.includes.alert')
        <div class="row user">
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                        <li class="nav-item"><a class="nav-link " href="#profile" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#site-logo" data-toggle="tab">Site Logo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#footer-seo" data-toggle="tab">Footer &amp; SEO</a></li>
                        <li class="nav-item"><a class="nav-link" href="#social-links" data-toggle="tab">Social Links</a></li>
                        <li class="nav-item"><a class="nav-link" href="#analytics" data-toggle="tab">Analytics</a></li>
                        <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Payments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#shipping" data-toggle="tab">Shipping</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="general">
                        @include('admin.settings.includes.general')
                    </div>
                    <div class="tab-pane" id="profile">
                        @include('admin.settings.includes.profile')
                    </div>
                    <div class="tab-pane fade" id="site-logo">
                        @include('admin.settings.includes.logo')
                    </div>
                    <div class="tab-pane fade" id="footer-seo">
                        @include('admin.settings.includes.footer_seo')
                    </div>
                    <div class="tab-pane fade" id="social-links">
                        @include('admin.settings.includes.social_links')
                    </div>
                    <div class="tab-pane fade" id="analytics">
                        @include('admin.settings.includes.analytics')
                    </div>
                    <div class="tab-pane fade" id="payments">
                        @include('admin.settings.includes.payments')
                    </div>
                    <div class="tab-pane fade" id="shipping">
                        @include('admin.settings.includes.shipping')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
