@extends('template.layout')
@section('title','Update Choice')
@section('home','active-nav-item')
@section('content')

<div class="h3 mb-2">Edit Kadidat</div>
<hr>
<form action="/updatechoice/{{$id->id}}" method="post" enctype="multipart/form-data" id="form-edit-choice">
	@csrf
	@method('put')
	<div class="row">
		<div class="col-sm-12">
			<label for="">Masukan Nama Baru:</label>
			<input type="text" name="choice" value="{{$id->name}}" class="form-control" required="">
		</div>
		<div class="col-sm-6 mt-3">
			<label for="">Masukan Visi baru:</label>
			<textarea name="visi" id="" cols="30" rows="10" class="form-control" required="">{{$id->visi}}</textarea>
		</div>
		<div class="col-sm-6 mt-3">
			<label for="">Masukan Misi baru:</label>
			<textarea name="misi" id="" cols="30" rows="10" class="form-control" required="">{{$id->misi}}</textarea>
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
	<button id="btn-edit-choice" type="submit" class="btn-success btn w-100 mt-3"><i class="fa fa-save" aria-hidden="true"></i>  Edit Choice</button>
</form>


<script type="text/javascript">
	$('#form-edit-choice').on('submit',function(){
		$('#btn-edit-choice').attr('disabled', 'true');

	});
</script>

@endsection