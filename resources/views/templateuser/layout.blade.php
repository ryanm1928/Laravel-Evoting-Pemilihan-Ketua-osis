@extends('templateuser.header')

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
					<a class="dropdown-item" href="/logout">Kirim pesan untuk admin</a>
					<a class="dropdown-item" href="/logout">Log out</a>	
				</div>
			</div>
		</div>
	</div>
</nav>
<div class="container">
	@yield('content')
</div>
@extends('templateuser.footer')
