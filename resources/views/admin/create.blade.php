@extends('template.layout')
@section('title','Buat Voting')
@section('buat','active-nav-item')
@section('content')

<div class="h3">Buat Voting</div>
<hr>
@if($poll >= 1 )

<div class="alert alert-warning"><li class="fa fa-exclamation-triangle"></li> Upss Kamu masih memiliki data voting yang belum selesai hapus/selesaikan voting tersebut </div>
@else
<form action="" method="get" class="" id="form-jumlah">
	<div class="row">
		<div class="col-lg-10">
			<label for="Jumlah">Masukan Jumlah Pilihan:</label>
			<input type="number" value="{{$_GET['jumlah'] ?? '' }}" min="2" max="6" name="jumlah" class="form-control" id="jumlah" required="" step="">
		</div>
		<div class="col-lg-2" style="margin-top: 2rem">
			<button id="btn-jumlah" type="submit" class="btn btn-success shadow w-100"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
		</div>
	</div>
</form>

<hr>

@if(isset($_GET['jumlah']))
<form action="{{route('poll.store')}}" method="post" enctype="multipart/form-data" id="form-create">
	@csrf
	<div class="row">
		<div class="col-sm-6">
			<label for="">Masukan Judul:</label>
			<input type="text" placeholder="Masukan Judul Polling..." name="title" class="form-control   @error('title') is-invalid @enderror" required="">
			@error('title')
			<div class="invalid-feedback">
				{{$message}}
			</div>
			@enderror
		</div>
		<div class="col-sm-6">
			<label for="">Masukan Deadline:</label>
			<input type="date" name="deadline" class="form-control   @error('deadline') is-invalid @enderror " required="">
			@error('deadline')
			<div class="invalid-feedback">
				{{$message}}
			</div>
			@enderror
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-sm-12">
			<label for="">Description:</label>
			<textarea class="form-control   @error('description') is-invalid @enderror" name="description" id="" cols="20" rows="10" placeholder="Description..." required=""></textarea>
			@error('description')
			<div class="invalid-feedback">
				{{$message}}
			</div>
			@enderror
		</div>
	</div>

	<hr>
	<div class="row mt-4">
		@for($i = 0; $i < $_GET['jumlah'];$i++ )

		<div class="col-sm-6 mb-3">
			<div class="card bg-light shadow" style="max-width: 33rem;">
				<div class="card-header bg-secondary text-light">Data</div>
				<div class="card-body text-primary">
					<label for="" class="text-dark">Masukan Nama Calon:</label>
					<input class="form-control" type="text" placeholder="Masukan Nama..." name="choice[]" required="">
					<label for="" class="text-dark mt-2">Masukan visi:</label>
					<input type="text" name="visi[]" placeholder="Masukan visi..." class="form-control">
					<label for="text"  class="text-dark mt-2">Masukan misi:</label>
					<input type="text" name="misi[]" placeholder="Masukan misi..." class="form-control">
					<div class="row mt-4">
						<div class="col-lg-8 mb-2">
							<div class="custom-file">
								<label  id="namafile" for="sampul" class="text-dark">Sampul:</label>
								<input type="file" id="file-{{$i}}" accept="image/*" name="gambar[]" required="">
							</div>
						</div>
						<div class="col-lg-4">
							<label for="file-{{$i}}" id="file-{{$i}}-preview">
								<img src="{{asset('gambar/deafult.png')}}" alt="" width="120px">
								<div style="font-size:10px; font-style: italic;">
									<span class="text-danger">*file harus berupa gambar</span>
								</div>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endfor
	</div>
	<div class="row mt-4">
		<div class="col-sm-12">
			<button type="submit" id="btn-create" class="btn btn-success w-100"><i class="fa fa-save" aria-hidden="true"></i> Buat voting</button>
		</div>
	</div>
</form>
@endif
<script type="text/javascript">
	function previewBeforeUpload(id){
		document.querySelector("#"+id).addEventListener("change",function(e){
			if(e.target.files.length == 0){
				return;
			}
			let file = e.target.files[0];
			let url = URL.createObjectURL(file);
			document.querySelector("#"+id+"-preview div").innerText = file.name;
			document.querySelector("#"+id+"-preview img").src = url;
		});
	}
	let jumlah = document.getElementById('jumlah').value;
	let page = '/poll/create'
	if(jumlah == 1)
	{
		alert('Jumlah Pilihan Tidak boleh 1')
		window.location = page;
	}else if (jumlah < 0) {
		alert('Jumlah Pilihan Tidak boleh kurang 0')
		window.location = page;

	}else if (jumlah > 10) {
		alert('Jumlah Pilihan Tidak boleh  lebih dari 10')
		window.location = page;
	}
	for (var i = 0; i < jumlah; i++) {
		previewBeforeUpload("file-"+i);
	}

	$('#form-create').on('submit',function(){
		$('#btn-create').attr('disabled', 'true');

	});


	$('#form-jumlah').on('submit',function(){
		$('#btn-jumlah').attr('disabled', 'true');

	});
</script>


@endif
@endsection