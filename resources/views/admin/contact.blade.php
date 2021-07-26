@extends('template.layout')
@section('title','Contact')
@section('contact','active-nav-item')
@section('content')

<center>
	<img src="{{asset('gambar/me.jpg')}}" alt="" class="img-fluid rounded-circle">
	<div class="h5 mt-1">MOHAMAD RIYAN</div>
	<div class="h6 mt-2">Programmer & Developer E-Voting</div>
	<div>
		<a href="https://web.facebook.com/profile.php?id=100010510620299" target="_blank"><img src="{{asset('gambar/socialmediaicon_01.png')}}" alt="" style="width: 38px"></a>
		<a href="https://api.whatsapp.com/send/?phone=6289513653977&text&app_absent=0" target="_blank"><img src="{{asset('gambar/socialmediaicon_06.png')}}" alt="" style="width: 38px"></a>
		<a href="https://www.instagram.com/riyan.rar/" target="_blank"><img src="{{asset('gambar/socialmediaicon_09.png')}}" alt="" style="width: 38px"></a>
		<a href="https://github.com/ryanm1928?tab=repositories" target="_blank"><img src="{{asset('gambar/socialmediaicon_20.png')}}" alt="" style="width: 38px"></a>
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