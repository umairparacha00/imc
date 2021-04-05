<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	@yield('title')
	<meta name="viewport"
		  content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
	<meta name="description" content="">
	<link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/all.min.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Proza+Libre:ital,wght@1,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon"/>
	<link rel="apple-touch-icon"/>
	
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-16x16.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/img/favicon-32x32.png")}}">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-3NXQKG34G8"></script>
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3NXQKG34G8');
	</script>
	@yield('style')
	@livewireStyles
</head>

<body>
<div id="ni-09" class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
	<div class="app-header header-shadow">
		<div class="app-header__logo">
			<div class="logo-src">
				<h2>Amlaen</h2>
			</div>
			<div class="header__pane ml-auto">
				<div>
					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
							data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
					</button>
				</div>
			</div>
		</div>
		<div class="app-header__mobile-menu">
			<div>
				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
				</button>
			</div>
		</div>
		<div class="app-header__menu">
                <span>
                    <button type="button"
							class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fal fa-ellipsis-v"></i>
                        </span>
                    </button>
                </span>
		</div>
		<div class="app-header__content">
			<div class="app-header-right">
				<div class="header-btn-lg pr-0">
					<div class="widget-content p-0">
						<div class="widget-content-wrapper">
							<div class="widget-content-left header-user-info">
								<div class="widget-heading">
									{{ current_user()->name }}
								</div>
								<div class="widget-subheading">
									@if (current_user()->getRoleNames()[0] == 'struggling')
										{{ 'Struggling' }}
									@elseif (current_user()->getRoleNames()[0] == 'officer')
										{{ 'Officer' }}
									@elseif (current_user()->getRoleNames()[0] == 'senior-officer')
										{{ 'Senior Officer' }}
									@elseif (current_user()->getRoleNames()[0] == 'manager')
										{{ 'Manager' }}
									@elseif (current_user()->getRoleNames()[0] == 'senior-manager')
										{{ 'Senior Manager' }}
									@elseif (current_user()->getRoleNames()[0] == 'general-manager')
										{{ 'General Manager' }}
									@elseif (current_user()->getRoleNames()[0] == 'director')
										{{ 'Director' }}
									@elseif (current_user()->getRoleNames()[0] == 'senior-director')
										{{ 'Senior Director' }}
									@elseif (current_user()->getRoleNames()[0] == 'partner')
										{{ 'Partner' }}
									@endif
								</div>
							</div>
							<div class="widget-content-left ml-3">
								<div class="btn-group">
									<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
									   class="p-0 btn d-flex align-items-center">
										<img width="42" height="42" class="rounded-circle"
											 src="{{ 'https://ui-avatars.com/api/?background=645bd3&color=fff&name=' . current_user()->name }}"
											 alt="User Avatar">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="app-main">
		<div class="app-sidebar sidebar-shadow">
			<div class="app-header__logo">
				<div class="logo-src">
					<h2>Amlaen</h2>
				</div>
				<div class="header__pane ml-auto">
					<div>
						<button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
								data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
						</button>
					</div>
				</div>
			</div>
			<div class="app-header__mobile-menu">
				<div>
					<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
					</button>
				</div>
			</div>
			<div class="app-header__menu">
                    <span>
                        <button type="button"
								class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fal fa-ellipsis-v"></i>
                            </span>
                        </button>
                    </span>
			</div>
			<div class="scrollbar-sidebar">
				<div class="app-sidebar__inner">
					<ul class="vertical-nav-menu">
						<li>
							<a href="{{ url('/dashboard') }}"
							   class="{{ Request::path() === 'dashboard' ? 'mm-active' : '' }}">
								<i class="metismenu-icon fal fa-tachometer-alt-average"></i>
								Dashboard
							</a>
						</li>
						<li class="{{ Request::is('youtube*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fab fa-youtube"></i>
								Youtube
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('youtube.channels.index') }}"
									   class="{{ Request::is('youtube/channels*')  ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>
										Channel Links
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ Request::is('instagram*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fab fa-instagram"></i>
								Instagram
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('instagram.profiles.index') }}"
									   class="{{ Request::path() === 'instagram/profiles' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>
										Profile Links
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ Request::is('facebook*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fab fa-facebook"></i>
								Facebook
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('facebook.pages.index') }}"
									   class="{{ Request::path() === 'facebook/pages' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>
										Page Links
									</a>
								</li>
							</ul>
						</li>
						<li class="@if (Request::is('transactions') || Request::is('withdraw'))
								mm-active
								@else
						
						@endif"
						>
							<a href="#">
								<i class="metismenu-icon fal fa-usd-circle"></i>
								Transactions
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ url('/transactions') }}"
									   class="{{ Request::path() === 'transactions' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Transactions
									</a>
								</li>
								<li>
									<a href="{{ url('/withdraw')}}"
									   class="{{ Request::path() === 'withdraw' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Withdraw
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ Request::is('network*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-users"></i>
								Network
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{url('/network/direct-referrals')}}"
									   class="{{ Request::path() === 'network/direct-referrals' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Direct Referrals
									</a>
								</li>
								<li>
									<a href="{{url('/network/tree')}}"
									   class="{{ Request::path() === 'network/tree' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Network Tree
									</a>
								</li>
								<li>
									<a href="{{('/network/referral-link')}}"
									   class="mb-0 {{ Request::path() === 'network/referral-link' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Referral Link
									</a>
								</li>
							</ul>
						</li>
						<li class="{{ Request::is('purchase*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-shopping-basket"></i>
								Purchase
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="{{ route('membership.create') }}"
									   class="mb-0 {{ Request::path() === 'purchase/membership' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Membership
									</a>
								</li>
								<li>
									<a href="{{ route('purchase.services.create') }}"
									   class="mb-0 {{ Request::path() === 'purchase/services' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6">
										</i>Services
									</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="{{ url('/profile') }}"
							   class="{{ Request::path() === 'profile' ? 'mm-active' : '' }}">
								<i class="metismenu-icon fal fa-address-card"></i>
								Profile
							</a>
						</li>
						<li class="{{ Request::is('settings*') ?  'mm-active' : '' }}">
							<a href="#">
								<i class="metismenu-icon fal fa-cog"></i>Settings
								<i class="metismenu-state-icon fal fa-angle-right"></i>
							</a>
							<ul>
								<li>
									<a href="/settings/change-password"
									   class="{{ Request::path() === 'settings/change-password' ? 'mm-active' : '' }}">
										<i class="fal fa-circle mr-3 fx-6"></i>Change Password
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="{{ route('logout') }}"
							   class="{{ Request::path() === 'logout' ? 'mm-active' : '' }}"
							   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<i class="metismenu-icon fal fa-power-off"></i>Logout
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST"
								  style="display: none;">
								@csrf
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="app-main__outer">
			<div class="app-main__inner">
				@yield('content')
			</div>
		</div>
	</div>
</div>
@include('sweetalert::alert')
</body>
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
@yield('page-script')
@livewireScripts
</html>
