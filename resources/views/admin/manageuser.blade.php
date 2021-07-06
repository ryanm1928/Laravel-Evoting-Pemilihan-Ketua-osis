@extends('template.layout')
@section('title','Manage Users')
@section('content')

<form action="/adduser" method="post">
	@csrf
	<h1>Manage User</h1>
	<a href="/admin">kembali</a>
	<input type="text" placeholder="Masukan Nama" name="nama">
	<input type="password" placeholder="Masukan Sandi" name="password">
	<select name="kelas" id="">
		@foreach($kelas as $data)
		<option value="{{$data->id}}">{{$data->kelas}}</option>
		@endforeach
	</select>
	<button type="submit">Tambah user</button>
</form>


@endsection