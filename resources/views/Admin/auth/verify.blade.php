@extends('layouts.guest_2')
@section('meta-data')
    <title>Verify Email - Imc.com</title>
    <meta
            name="description"
            content="Imc is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Branding."
    />
    <meta name="Keywords" content="Imc login, Imc.com, Digital Marketing, Imc Digital Marketing Agency"/>
    <!-- Custom Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}"/>
@endsection
@section('content')
    <div class="container-fluid login-page">
        <div class="container">
            <div class="row">
                <div class="fuh_674_hjkf">
                    <div class="main-title">
                        <h1>Verify Your Email Address.</h1>
                    </div>
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="login-button">
                            <button type="submit" class="btn btn-lg btn-block text-uppercase">Resend verification link</button>
                        </div>
                        <div class="login-button">
                            <a href="{{ route('logout') }}" class="btn btn-lg btn-block text-uppercase" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                        </div>
                    </form>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
