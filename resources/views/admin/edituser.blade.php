@extends('template.layout')
@section('title','Edit User')
@section('datauser','active-nav-item')
@section('content')
<div class="h3">Edit Pengguna:</div>

<form action="/datauser/edit/{{$user->id}}" method="post">
	@csrf
	@method('put')
	<div class="row">
		<div class="col-sm-8">
			<label for=""><i class="fa fa-user" aria-hidden="true"></i> Masukan ID :</label>
			<input type="text" placeholder="Masukan ID..." name="nama" class="form-control" value="{{$user->name}}">
		</div>
		<div class="col-sm-8 mt-3">
			<label for=""> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Masukan Password:</label>
			<input type="text" placeholder="Masukan Sandi..." name="password" class="form-control" value="">
		</div>
		<!-- <div class="col-sm-8 mt-3">
			<label><i class="fa fa-home" aria-hidden="true"></i> Masukan Kelas:</label>
			<select name="kelas" id="" class="form-control" mul>
				@foreach($kelas as $data)
				<option value="{{$data->id}}">{{$data->kelas}}</option>
				@endforeach
			</select>
		</div> -->
	</div>
	<button class="btn btn-success w-25 mt-3" type="submit"><i class="fa fa-file" aria-hidden="true"></i> Edit Data</button>
</form>
@endsection