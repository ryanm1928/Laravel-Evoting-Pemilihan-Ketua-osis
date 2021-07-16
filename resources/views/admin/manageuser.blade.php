@extends('template.layout')
@section('title','Manage Users')
@section('tambah','active-nav-item')
@section('content')


<div class="h3">Tambah Pengguna</div>
<form action="/datauser" method="post">
	@csrf
	<div class="row">
		<div class="col-sm-12">
			<label for=""><i class="fa fa-user" aria-hidden="true"></i> Masukan ID :</label>
			<input type="text" placeholder="Masukan ID..." name="nama" class="form-control">
		</div>
		<div class="col-sm-12 mt-3">
			<label for=""> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Masukan Password:</label>
			<input type="password" placeholder="Masukan Sandi..." name="password" class="form-control">
		</div>
		<div class="col-sm-12 mt-3">
			<label><i class="fa fa-home" aria-hidden="true"></i> Masukan Kelas:</label>
			<select name="kelas" id="" class="form-control">
				@foreach($kelas as $data)
				<option value="{{$data->id}}">{{$data->kelas}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<button class="btn btn-success w-25 mt-3"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
</form>

@endsection