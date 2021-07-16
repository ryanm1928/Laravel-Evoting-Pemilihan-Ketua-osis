@extends('template.layout')
@section('title','Update Choice')
@section('home','active-nav-item')
@section('content')
<h1>Edit Choice</h1>

<form action="/updatechoice/{{$id->id}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('put')
	<div class="row">
		<div class="col-sm-8">
			<label for="">Masukan Nama Baru:</label>
			<input type="text" name="choice" value="{{$id->name}}" class="form-control" required="">
		</div>
	</div>
	<div class="row mt-4">
		
		<div class="col-sm-8 d-block">
			<label for="">Masukan Sampul Baru:</label>
			<input type="file" onchange="berubah()" id="sampul" name="sampul" class="form-control">
			
		</div>
	</div>
	<img src="{{asset($id->sampul)}}" alt="" width="200px" class="d-block mt-3" id="gambar">
	<label  id="namafile" for="sampul" class="text-danger" style="font-size: 12px; font-style: italic;">*file harus berupa gambar</label>
	<button type="submit" class="btn-success btn w-100 mt-3"><i class="fa fa-save" aria-hidden="true"></i>  Edit Choice</button>
</form>




@endsection