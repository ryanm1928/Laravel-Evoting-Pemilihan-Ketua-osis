<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<script src="/js/jquery.js"></script>
	<script type="/js/jquery-slim.js"></script>
	<link rel="stylesheet" href="/header/styleuser.css">
	<link rel="stylesheet" href="/icon/css/font-awesome.min.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg  bg-primary mb-3 fixed-top">
		<div class="container">
			<div class="navbar-brand text-light ">E-Voting</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<li class="fa fa-2x fa-bars text-light"></li>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link text-light" href="/user">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<div class="nav-item dropdown ">
					<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<li class="fa fa-user"></li> {{  strtoupper(auth()->user()->username)}}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/user-mails">Kirim pesan ke admin</a>
						<form action="/logout" method="post">
                    	@csrf
                        <button class="dropdown-item" id="btn-logout" type="submit" style="background-color: transparent;border: none;">
                            <i class="fa fa-sign-out text-left" aria-hidden="true"></i> Logout
                       </button>
                </form>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top:75px">
		@yield('content')
	</div>
	
<footer class="fixed-bottom" style="background-color: #CECECE;">
	<div class="row p-2">
		<div class="col-xl-10">
			<div>©{{date('Y')}}</div>
		</div>
		<div class="col-xl-2">
			<a href="https://www.instagram.com/riyan.rar/" style="font-size: 15px;">made by MOHAMAD RIYAN</a>
		</div>
	</div>
</footer>

</body>
<script src="/js/bootstrap.bundle.min.js"></script>
</html>
