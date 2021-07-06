@extends('template.layout')

@section('title','Login')
@section('content')
@if(session('status'))
<h1 style="color: red">{{session('status')}}</h1>
@endif
<form action="/login" method="post">
	@csrf
	<h1>Halaman Login</h1>
	<label for="">Name:</label>
	<input type="text" placeholder="Masukan name..." name="name" required="">
	<label for="">Password:</label>
	<input type="password" placeholder="Masukan sandi..." name="password" required="">
	<button type="submit">Login</button>
</form>
@endsection