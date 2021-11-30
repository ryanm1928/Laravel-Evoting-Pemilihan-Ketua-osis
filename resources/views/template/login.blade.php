<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/header/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/icon/css/font-awesome.min.css">
	<script src="/js/jquery.js"></script>
</head>
<body>
	<div class="container pl-0">
		@yield('content-alert')
	</div>
	<div class="container p-2">
		@yield('content')
	</div>
</body>
</html>