@extends('layouts.guest_2')
@section('style')

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
@endsection
@section('form')
    <h1 class="h3 text-uppercase">Hi, {{ current_user()->name }}</h1>
    <p >Verify Your Email Address.</p>
    @if (session('resent'))
        <div class="alert alert-success w-100 alert-dismissible fade show" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
@endsection
