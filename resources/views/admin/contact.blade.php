@extends('template.layout')
@section('title','Contact')
@section('contact','active-nav-item')
@section('content')

<center>
	<img src="{{asset('gambar/me.jpg')}}" alt="" class="img-fluid rounded-circle">
	<div class="h5 mt-1">MOHAMAD RIYAN</div>
	<div class="h6 mt-2">Programmer & Developer E-Voting</div>
	<div>
		<a href="https://web.facebook.com/profile.php?id=100010510620299" target="_blank"><i class="text-primary mx-1 mt-2 fa fa-2x fa-facebook-official" aria-hidden="true"></i></a>
		<a href="https://api.whatsapp.com/send/?phone=6289513653977&text&app_absent=0" target="_blank"><i class="text-success mx-1 mt-2 fa fa-2x fa-whatsapp" aria-hidden="true"></i></a>
		<a href="https://www.instagram.com/riyan.rar/" target="_blank"><i class="text-danger mx-1 mt-2 fa fa-2x fa-instagram" aria-hidden="true"></i></a>
		<a href="https://github.com/ryanm1928?tab=repositories" target="_blank"><i class="text-dark mx-1 mt-2 fa fa-2x fa-github" aria-hidden="true"></i></a>
	</div>

	<div class="mt-5 mb-3 h6">This Application is made with:</div>
	<div class="mt-2">
		<img src="{{asset('gambar/laravel_logo.png')}}" alt="" class="img-fluid mx-2">
		<img src="{{asset('gambar/jquery_logo.png')}}" alt="" class="img-fluid mx-2">
		<img src="{{asset('gambar/b_logo.png')}}" alt="" class="img-fluid mx-2">
		<img src="{{asset('gambar/mysql_logo.png')}}" alt="" class="img-fluid mx-2">
	</div>
</center>

<div class="" style="margin-top: 70px;">
	<div class="row p-2">
		<div class="col-sm-9">
			<div>©2021-{{date('Y')}}</div>
		</div>
		<div class="col-sm-3">
			<a style="font-size: 14px;">made by MOHAMAD RIYAN</a>
		</div>
	</div>
</div>


@endsection