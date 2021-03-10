{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('password.update') }}">--}}
{{--                        @csrf--}}

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

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
{{--                                    {{ __('Reset Password') }}--}}
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
    <title> Password Reset | Imc.com</title>
    <meta
            name="description"
            content="Mereow is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Brading."
    />
    <meta
            name="Keywords"
            content="Mereow password reset, Mereow.com, Digital Marketing, Mereow Digital Marketing Agency"
    />
    <!-- Custom Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}" />
    <style>
        .login-button {
            clear: both;
            margin-bottom: 15px;
            -webkit-box-shadow: 2px 5px 14px 1px #ccc;
            box-shadow: 2px 5px 14px 1px #ccc;
        }
        .login-button .btn {
            background-color: var(--secondary-color);
            border: 1px solid var(--secondary-color);
            padding: 10px 40px;
            border-radius: 0;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
        }
        .login-button .btn:hover{
            box-shadow: 0 8px 25px -8px var(--secondary-color2);
            color: white;
        }
        .plk_08w009 a, .plk_08w009 span {
            color: var(--secondary-color2)
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid login-page">
        <div class="container">
            <div class="row">
                <div class="fuh_674_hjkf">
                    <div class="main-title">
                        <h1>Amlaen</h1>
                    </div>
                    <form method="POST" class="login-form" action="{{ route('password.update') }}">
                        @csrf
                        <h1 class="h3 text-uppercase">Enter New Password</h1>
                        @error('password')
                        <div class="alert alert-danger w-100 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        @error('email')
                        <div class="alert alert-danger w-100 alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group kl23_3rte3">
                            <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Email"
                                    value="{{ $email ?? old('email') }}"
                                    required="required"
                                    class="form-control"
                            />
                        </div>
                        <div class="form-group kl23_3rte3">
                            <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Password"
                                    required="required"
                                    class="form-control"
                            />
                        </div>
                        <div class="form-group kl23_3rte3">
                            <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Confirm Password"
                                    required="required"
                                    class="form-control"
                            />
                        </div>
                        <div class="login-button">
                            <button type="submit" class="btn btn-lg btn-block text-uppercase">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection