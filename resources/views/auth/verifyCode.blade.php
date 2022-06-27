@extends('layouts.site')

@section('content')
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <div class="container top-50 start-50 translate-middle position-absolute">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Enter verification code') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 offset-md-4">
                                <p>we send verification code to your mobile: {{auth()->user()->mobile}} </p>

                            </div>
                        </div>


                        <form method="POST" action="{{route('auth.verify')}}">
                            @csrf


                            <div class="form-group row">
                                <label for="otp"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                                <div class="col-md-6">
                                    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror"
                                           name="otp" value="{{ old('otp') }}" required autocomplete="otp" autofocus>

                                    @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 ">
                                <div class="col-md-3 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify') }}
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-link" href="{{route('auth.resendOtp')}}">
                                        {{ __('resend new code') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
