@extends('template.layout')
@section('title','User Page')

@section('content')
<h1>Halaman User</h1>
@if(session('status'))
<h1 style="color: red">{{session('status')}}</h1>
@endif
<a href="/logout">Logout</a>
<table border="2px solid black">
	<tr>
		<th>No</th>
		<th>sampul</th>
		<th>title</th>
		<th>description</th>
		<th>Action</th>
	</tr>
	@foreach($poll as $data)
	<tr>
		<?php dd($data->sampul); ?>
		<th>{{$loop->iteration}}</th>
		<th>{{$data->sampul}}</th>
		<th>{{$data->title}}</th>
		<th>{{$data->description}}</th>
		<th>{{$data->deadline}}</th>
		@if($data->vote->count() > 0)
		<th><a href="/result/{{$data->id}}">Lihat hasil</a></th>
		@else
		<th><a href="polling/{{$data->id}}">Lakukan Polling</a></th>
		@endif
	</tr>
	@endforeach
</table>
@endsection