<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<style>
		body{
			
			background-color: rgba(0,0,0,.07);
			padding-top: 4%;
			padding-bottom: 3%;
		}
		.container{
			background-color: white;
			box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%) !important;
		}
		.form-control{
			border: none;
		}
		.garis{
			border-bottom: 2px solid black;
		}
		.hilang{
			display: none;

		}
		@media(max-width:768px )
		{
			#foot-login{
				margin-left: 70px;
			}
			#login-contact{
				margin-left: 10px;
			}

		}

		@media(max-width:375px )
		{
			#foot-login{
				margin-left: 30px;
			}
			#login-contact{
				margin-left: 10px;
			}
			body{
				padding-top: 0%;
				padding-bottom: 0%;
			}
		}
		
	</style>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<script src="/js/jquery.js"></script>
</head>
<body>
	<div class="container p-5">
		@yield('content')
	</div>
</body>
</html>