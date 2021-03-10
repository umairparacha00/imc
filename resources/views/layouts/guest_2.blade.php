<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Bootstrap Css File -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />
	@yield('meta-data')
</head>

<body class="loading">
<!-- Pre Loader -->
<div class="spinner-wrapper">
	<div class="spinner"></div>
</div>
<div>
	@yield('content')
</div>
</body>
<!-- Jquery Js -->
<script src="{{ asset('assets/js/jquery.3.4.1.js')}}"></script>
<!-- Custom Js -->
<script src="{{ asset('assets/js/main1.js')}}"></script>
</html>
