<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<script src="/js/jquery.js"></script>
	<script type="/js/jquery-slim.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<style>
		#icon{
			margin-top: 50px;
		}
		@media (max-width: 768px) {
			.user-content{
				margin: 7px;
			}
			#icon{
				margin-top: 5px;
			}
			#img-none{
				display: none;
			}
		}
		#paslon:hover{
			background-color: #007bff;
			color: white;
		}
		#btn-voting:hover{
			color: white;
			text-decoration: underline;

		}
		#user-icon{
			font-size: 120px;
		}
		

		@media(max-width:375px )
		{
			#user-icon{
				font-size: 70px;
			}
		}
		
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg  bg-primary mb-3">
		<div class="container">
			<div class="navbar-brand text-light display-3">E-Voting</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<li class="fa fa-2x fa-bars text-light"></li>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link text-light active" href="/user">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<div class="nav-item dropdown ">
					<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<li class="fa fa-user"></li> {{auth()->user()->name}}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/user-mails">Kirim pesan ke admin</a>
						<a class="dropdown-item" href="/logout">Log out</a>	
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
</body>
<footer class="fixed-bottom" style="background-color: #CECECE;">
	<div class="row p-2">
		<div class="col-sm-10">
			<div>©2021-{{date('Y')}}</div>
		</div>
		<div class="col-sm-2">
			<a href="" style="font-size: 15px;">made by MOHAMAD RIYAN</a>
		</div>
	</div>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>
