<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('meta')
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("assets/img/favicon-32x32.png")}}">
    <!-- Bootstrap Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css')}}" />
    <!-- Custom Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" />
    <!-- Slick Css -->
    <link rel="stylesheet" href="{{ asset('assets/slick/slick.css')}}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3NXQKG34G8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'G-3NXQKG34G8');
    </script>
    <script data-ad-client="ca-pub-1021925910806846" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    @yield('style')
</head>

<body class="loading">
<div>
    <!-- Pre Loader -->
    <div class="spinner-wrapper">
        <div class="spinner"></div>
    </div>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-md main-menu fixed-top">
            <a href="/" class="navbar-brand">
                <h1 class="site-title">Amlaen</h1>
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"`
                    class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto ko">
                    <li>
                        <a href="/" class="{{ request()->path() === '/' ? 'active' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="/services" class="{{ request()->path() === 'services' ? 'active' : '' }}">Services</a>
                    </li>
                    <li><a href="/about_us" class="{{ request()->path() === 'about_us' ? 'active' : '' }}">About Us </a></li>
                    <li><a href="/contact_us" class="{{ request()->path() === 'contact_us' ? 'active' : '' }}">Contact US</a></li>
{{--                    <li><a href="/pricing" class="{{ request()->path() === 'pricing' ? 'active' : '' }}">Pricing</a></li>--}}
                    <li><a href="/login">login</a></li>
                    <li><a href="/register">Sign Up</a></li>
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- homepage -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-1021925910806846"
         data-ad-slot="9410719802"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <footer class="footer footer-wrap">
        <div class="container">
            <div class="footer">
                <div class="container-fluid">
                    <div class="row footer-content">
                        <div class="col-sm-12 text-center">
                            <div class="copy-right">
                                © Copyright 2019-2025. Amlaen.com. All right reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
<!-- Jquery Js -->
<script src="{{ asset('assets/js/jquery.3.4.1.js')}}"></script>
<!-- Bootstrap Js -->
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{ asset('assets/js/main1.js')}}"></script>
<!-- Slick Js -->
<script src="{{ asset('assets/slick/slick.js')}}"></script>
</html>