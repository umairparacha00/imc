<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Register-Amlaen.com</title>
	<meta name="description"
		  content="Amlaen is one of the top advertisers which provides numerous options to boots and enhance your Viewership and Brading."/>
	<meta name="Keywords"
		  content="Amlaen register, Amlaen registration page, Amlaen Sign up, Amlaen.com, Digital Marketing, Amlaen Digital Marketing Agency"/>
	{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>--}}
	<link rel="stylesheet" href="/assets/css/main.css"/>
	<style>
        @import url("https://fonts.googleapis.com/css?family=Lato|Proza+Libre:400,700i&display=swap");

        :root {
            --main-color: #000000;
            --secondary-color: #392396;
            --secondary-color2: #2e158c;
            --heading-color: #001b41;
            --para-color: #777777
        }

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px
        }

        body {
            font-family: Lato, sans-serif;
            margin: 0;
            padding: 0;
            background: var(--secondary-color) none;
        }


        h1, h2, h3, h4, h5, h6 {
            font-weight: 700 !important;
            margin: 0 0 20px !important
        }

        fieldset, form, h1, h2, h3, h4, h5, h6, input, p, ul {
            margin: 0;
            padding: 0;
            list-style: none
        }

        a {
            color: var(--secondary-color)
        }

        a:focus, a:hover {
            text-decoration: none
        }

        button:focus {
            outline: 0 !important
        }

        img, svg {
            vertical-align: middle
        }

        .register-page {
            padding: 2.5em 0
        }

        .form-container {
            max-width: 740px;
            color: #000;
            margin: 0 auto;
            position: relative;
            background: #fff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px !important;
            border-bottom-right-radius: 8px !important;
            box-shadow: 9px 20px 55px 0 rgba(0, 0, 0, .4);
            -webkit-box-shadow: 8px 20px 53px 0 rgba(0, 0, 0, .4);
            -moz-box-shadow: 8px 20px 53px 0 rgba(0, 0, 0, .4)
        }

        .main-title {
            font-family: "Proza Libre", sans-serif !important;
            text-align: center;
            color: var(--secondary-color);
            font-style: italic;
            padding-top: 2em
        }

        .main-title h1 {
            margin-bottom: 0 !important
        }

        .inner-form-container {
            width: 100%;
            padding: 2em;
            background-color: #fff;
            margin: 0
        }

        .container .form-container .inner-form-container .form-control {
            border: 1px solid #d1d1d1;
            color: #212529
        }

        .loader {
            display: flex;
            position: absolute;
            left: 0%;
            top: 0%;
            right: 0%;
            bottom: 0%;
            z-index: 9999;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .5);
        }

        .form-container .inner-form-container .form-control {
            border: 1px solid #d1d1d1;
            padding: 14px 27px 14px 13px;
            color: #212529;
            border-radius: 0;
            height: 40px;
            -webkit-box-shadow: 2px 5px 14px 1px #ccc;
            box-shadow: 2px 5px 14px 1px #ccc
        }

        .form-group {
            padding-left: 0 !important
        }

        .form-container .inner-form-container .full-name input, .form-container .inner-form-container .sponsor input, .form-container .inner-form-container .username input {
            background-image: url("{{asset('assets/images/icons/user-icon.png')}}");
            background-repeat: no-repeat;
            background-position: right 12px center
        }

        .form-container .inner-form-container .password input {
            background-image: url("{{ asset('assets/images/icons/password-icon.png') }}");
            background-repeat: no-repeat;
            background-position: right 12px center
        }

        .form-container .inner-form-container .email input {
            background-image: url("{{ asset('assets/images/icons/email-icon.png') }}");
            background-repeat: no-repeat;
            background-position: right 12px center
        }

        .form-container .inner-form-container .spn-h3 {
            color: var(--secondary-color);
            text-align: left;
            font-style: italic;
            font-family: "Proza Libre", sans-serif !important
        }

        .terms-conditions {
            color: #999;
            padding-top: .32em
        }

        .terms-conditions .link a {
            color: var(--main-color);
            font-size: 1rem
        }

        .register-button .btn {
            background-color: var(--secondary-color);
            font-size: 1rem;
            padding: .9em 5.31em;
            font-weight: 700;
            color: white;
            border-radius: 0;
            text-transform: uppercase;
            border: 1px solid var(--secondary-color)
        }

        .register-button .btn:hover {
            background-color: var(--secondary-color2)
        }

        @media (min-width: 768px) {
            .container .form-container .inner-form-container .email, .container .form-container .inner-form-container .username {
                padding-right: 1.25em
            }
        }
	</style>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<!-- Header -->
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
						<div class="form-group col-xl-6 col-lg-6 col-md-6 username">
							<input type="text"
								   id="username"
								   name="username"
								   placeholder="User Name"
								   value="{{ old('username') }}"
								   required class="form-control"/>
						</div>
						<div class="form-group col-xl-6 col-lg-6 col-md-6 full-name">
							<input type="text"
								   id="name"
								   name="name"
								   placeholder="Full Name"
								   value="{{ old('name') }}"
								   required class="form-control"/>
						</div>
						<div class="form-group col-xl-6 col-lg-6 col-md-6 email">
							<input type="email"
								   id="email"
								   name="email"
								   placeholder="Email"
								   value="{{ old('email') }}"
								   required class="form-control"/>
						</div>
						<div class="form-group col-xl-6 col-lg-6 col-md-6 sponsor">
							<input type="text"
								   id="sponsor"
								   name="sponsor"
								   placeholder="Your Sponsor Id"
								   value="@if($sponsor){{ $sponsor }}@elseif(!$sponsor){{ 100000000000 }}@else{{ old('sponsor') }}@endif"
								   required class="form-control"/>
						</div>
						<div class="form-group col-xl-6 col-lg-6 col-md-6 password">
							<input type="password"
								   id="password"
								   name="password"
								   placeholder="Password"
								   required class="form-control"/>
						</div>
						<div class="form-group col-xl-6 col-lg-6 col-md-6 password">
							<input type="password"
								   name="password_confirmation"
								   placeholder="Confirm Password"
								   required class="form-control"
							/>
						</div>
						<div class="form-group col-xl-6 col-lg-6 col-md-6 password">
							<input type="text"
								   name="pl_pin"
								   placeholder="Personal Pin"
								   required class="form-control"
							/>
						</div>
						<div class="col-xl-12 text-center terms-conditions text-uppercase">
							By joining, you agree to our
							<div class="link">
								<a href="{{ url('terms') }}">TERMS AND CONDITIONS</a>
							</div>
						</div>
						<div class="reCaptcha col-xl-12 text-center">
							<div>
								<div style="width: 304px; height: 78px; margin: 1em auto;">
									<div class="g-recaptcha"
										 data-sitekey="6Ldu3voUAAAAAMpf-84CLced4I2oOXb4Q6wQhDMz"></div>
									<br/>
									<input type="submit" value="Submit"/>
								</div>
							</div>
						</div>
						<div class="register-button text-center col-12">
							<button type="submit" class="btn btn-md">
								Signup
							</button>
						</div>
						<div class="col-xl-12 text-center terms-conditions">
							Have an account? <a href="{{route('login')}}">Login</a>
							or go to
							<a href="{{ url('/') }}">Home</a>
						</div>
					</div>
				</form>
				<div class="loader-wrapper">
					<div id="loader" class="loader">
						<img src="{{ asset('assets/images/svg/loader.svg') }}"
							 width="75" alt="" class="loading-image"
							 style="opacity: 1;"
						>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/jquery.js"></script>
<script>
    $(window).on("load", function () {
        $(".loader-wrapper").fadeOut(200, function () {
            $('#loader').removeClass('loader');
        });
    });
</script>
</body>
</html>

