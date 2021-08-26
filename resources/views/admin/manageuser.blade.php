@extends('template.layout')
@section('title','Tambah Pengguna')
@section('tambah','active-nav-item')
@section('content')

<div class="mb-0 mt-0">
	<div class="row">
		<div class="col-lg-10 mb-2">
			<div class="h3">Tambah Pengguna</div>
		</div>
		<div class="col-lg-2">
			<a href="/importdata" class="btn btn-primary mb-2 w-100"><i class="fa fa-upload" aria-hidden="true"></i> ImportData</a>
		</div>
	</div>
</div>
<hr>
<form action="/datauser" method="post" id="form-user">
	@csrf
	<div class="row">
		<div class="col-sm-12 mb-3">
			<label for=""><i class="fa fa-user" aria-hidden="true"></i> Masukan Nama :</label>
			<input type="text" placeholder="Masukan nama..." name="username" class="form-control">
		</div>
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
		<div class="col-sm-12 mt-3">
			<label><i class="fa fa-street-view" aria-hidden="true"></i> Role:</label>
			<select name="role" id="" class="form-control">
				<option value="user">User</option>
				<option value="admin">Admin</option>
			</select>
		</div>
	</div>
	<button id="btn-user" class="btn btn-success w-100 mt-3"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
</form>

<script type="text/javascript">
	$('#form-user').on('submit',function(){
		$('#btn-user').attr('disabled', 'true');

	});
</script>
@endsection