@extends('template.layout')
@section('title','Admin Dashboard')

@section('content')

<h1>Halaman Admin</h1>

@if(session('status'))
<h1 style="color: green">{{session('status')}}</h1>
@endif
<a href="/logout">Logout</a>
<a href="{{route('poll.create')}}">Buat Polling</a>
<a href="/manageuser">Buat user</a>

<table border="2px solid black">
	<tr>
		<th>No</th>
		<th>Judul</th>
		<th>Description</th>
		<th>Di Buat oleh</th>
		<th>Deadline</th>
		<th>Action</th>
	</tr>
	@foreach($poll as $data)
	<tr>
		<td>{{$data->id}}</td>
		<td>{{$data->title}}</td>
		<td>{{$data->description}}</td>
		<td>{{$data->creator->name}}</td>
		<td>{{$data->deadline}}</td>
		<td><a href="">Hapus</a><a href="{{route('poll.edit',['poll' => $data->id])}}"> Edit data</a></td>
	</tr>
	@endforeach
</table>
@endsection