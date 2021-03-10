{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('layouts.guest_2')
@section('meta-data')
    <title>Register - Imc.com</title>
    <meta
            name="description"
            content="Imc is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Brading."
    />
    <meta
            name="Keywords"
            content="Imc login, Imc.com, Digital Marketing, Imc Digital Marketing Agency"
    />
    <!-- Custom Css File -->
    <link rel="stylesheet" href="assets/css/register.css" />
@endsection
@section('content')
    <div class="main">
        <div class="container-fluid register-page">
            <div class="container">
                <div class="form-container">
                    <div class="main-title">
                        <h1>Registration</h1>
                    </div>
                    <form class="registration-form" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row inner-form-container">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger w-100 show" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 username ">
                                <input type="text"
                                       id="username"
                                       name="username"
                                       placeholder="User Name"
                                       value="{{ old('username') }}"
                                       required class="form-control @error('username') is-invalid @enderror"/>
                            </div>
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 full-name">
                                <input type="text"
                                       id="name"
                                       name="name"
                                       placeholder="Full Name"
                                       value="{{ old('name') }}"
                                       required class="form-control @error('name') is-invalid @enderror"/>
                            </div>
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 email">
                                <input type="email"
                                       id="email"
                                       name="email"
                                       placeholder="Email"
                                       value="{{ old('email') }}"
                                       required class="form-control @error('email') is-invalid @enderror"/>
                            </div>
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 sponsor @error('sponsor') is-invalid @enderror">
                                <input type="text"
                                       id="sponsor"
                                       name="sponsor"
                                       placeholder="Your Sponsor Id"
{{--                                       value="@if ($sponsor){{ $sponsor }}@else{{ old('sponsor') }}@endif"--}}
                                       required class="form-control @error('sponsor') is-invalid @enderror"/>
                            </div>
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 password">
                                <input type="password"
                                       id="password"
                                       name="password"
                                       placeholder="Password"
                                       required class="form-control"/>
                            </div>
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 password ">
                                <input type="password"
                                       name="password_confirmation"
                                       placeholder="Confirm Password"
                                       required class="form-control @error('password') is-invalid @enderror"
                                />
                            </div>
                            <div class="col-xl-12 text-center terms-conditions text-uppercase">
                                By joining, you agree to our
                                <div class="link">
                                    <a href="{{ route('terms_and_conditions') }}">TERMS AND CONDITIONS</a>
                                </div>
                            </div>
                            <div class="reCaptcha col-xl-12 text-center mt-1 mb-1">
                                
                                {!! NoCaptcha::display() !!}
                            
                            </div>
                            <div class="register-button text-center col-12">
                                <button type="submit" class="btn btn-md btn-primary">
                                    Signup
                                </button>
                            </div>
                            <div class="col-xl-12 text-center terms-conditions">
                                Have an account? <a href="{{ route('login') }}">Login</a>
                                or go to
                                <a href="{{ url('/') }}">Home</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
