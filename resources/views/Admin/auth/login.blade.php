{{--@extends('layouts.guest_2')--}}
{{--@section('style')--}}
{{--    .fuh_674_hjkf .form-group.kl23_3rte3 input {--}}
{{--    background-image: url("/assets/images/icons/password-icon.png");--}}
{{--    background-repeat: no-repeat;--}}
{{--    background-position: center right 13px--}}
{{--    }--}}

{{--    .buttons {--}}
{{--    display: inline--}}
{{--    }--}}

{{--    .plk_09nkj34 .btn {--}}
{{--    background: #392396;--}}
{{--    padding: 10px 40px;--}}
{{--    border-radius: 0;--}}
{{--    border: none;--}}
{{--    color: #fff;--}}
{{--    font-size: 15px;--}}
{{--    font-weight: 700--}}
{{--    }--}}

{{--    .plk_09nkj34:hover .btn {--}}
{{--    box-shadow: 0 8px 25px -8px #7367f0;--}}
{{--    color: #ffffff;--}}
{{--    }--}}

{{--    .re-button .btn {--}}
{{--    border: 1px solid var(--secondary-color);--}}
{{--    padding: 9px 35px;--}}
{{--    border-radius: 0;--}}
{{--    color: var(--secondary-color);--}}
{{--    font-size: 15px;--}}
{{--    font-weight: 700--}}
{{--    }--}}

{{--    .re-button:hover .btn {--}}
{{--    background: #392396;--}}
{{--    color: #fff;--}}
{{--    border: 1px solid transparent--}}
{{--    }--}}
{{--    .plk_08w03 {--}}
{{--    padding-bottom: 2em--}}
{{--    }--}}

{{--    .login-form .plk_08w03 .plk_08w009 {--}}
{{--    float: left;--}}
{{--    min-width: 50%--}}
{{--    }--}}

{{--    .plk_08w009 a, .plk_08w009 span {--}}
{{--    color: var(--secondary-color2)--}}
{{--    }--}}

{{--    .plk_09820b {--}}
{{--    float: right;--}}
{{--    min-width: 50%--}}
{{--    }--}}

{{--    .plk_08w03 .plk_09820b, .plk_08w03 .plk_09820b a {--}}
{{--    color: #555--}}
{{--    }--}}
{{--@endsection--}}
{{--@section('form')--}}
{{--    <form autocomplete="off" method="POST" class="login-form" action="{{ '/admin/login' }}">--}}
{{--        @csrf--}}
{{--        <h1 class="h3 text-uppercase">Admin Login</h1>--}}
{{--        @if($errors->any())--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <div class="alert alert-danger w-100" role="alert">--}}
{{--                    {{ $error }}--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--        @if(Session::has('error_message'))--}}
{{--                <div class="alert alert-danger w-100" role="alert">--}}
{{--                    {{ Session::get('error_message') }}--}}
{{--                </div>--}}
{{--        @endif--}}
{{--        <div class="form-group emi_j4gk">--}}
{{--            <input--}}
{{--                    type="text"--}}
{{--                    id="email"--}}
{{--                    name="email"--}}
{{--                    placeholder="Email"--}}
{{--                    required="required"--}}
{{--                    value="{{ old('email') }}"--}}
{{--                    autofocus="autofocus"--}}
{{--                    class="form-control"--}}
{{--            />--}}
{{--        </div>--}}

{{--        <div class="form-group kl23_3rte3">--}}
{{--            <input--}}
{{--                    type="password"--}}
{{--                    id="password"--}}
{{--                    name="password"--}}
{{--                    placeholder="Password"--}}
{{--                    required="required"--}}
{{--                    class="form-control"--}}
{{--            />--}}
{{--        </div>--}}
{{--        <div class="plk_08w03">--}}
{{--            <div class="plk_08w009 pr">--}}
{{--                <a href="{{ url('/') }}">Home</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="buttons">--}}
{{--            <div class="plk_09nkj34">--}}
{{--                <button type="submit" class="btn btn-lg btn-block text-uppercase">--}}
{{--                    Login--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}

@extends('layouts.guest_2')
@section('meta-data')
	<title>Login - Imc.com</title>
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
						<h1>Imc</h1>
					</div>
					<form autocomplete="off" method="POST" class="login-form" action="{{ '/admin/login' }}">
						@csrf
						<h1 class="h3 text-uppercase">Admin Login</h1>
						@if($errors->any())
							@foreach ($errors->all() as $error)
								<div class="alert alert-danger w-100" role="alert">
									{{ $error }}
								</div>
							@endforeach
						@endif
						@if(Session::has('error_message'))
							<div class="alert alert-danger w-100" role="alert">
								{{ Session::get('error_message') }}
							</div>
						@endif
						<div class="form-group emi_j4gk">
							<input
									type="text"
									id="email"
									name="email"
									placeholder="Email"
									required="required"
									value="{{ old('email') }}"
									autofocus="autofocus"
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
						<div class="plk_08w03">
							<div class="plk_08w009 pr">
								<a href="{{ url('/') }}">Home</a>
							</div>
						</div>
						<div class="buttons">
							<div class="umaoi">
								<button type="submit" class="admin-btn btn-lg btn-block text-uppercase">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection