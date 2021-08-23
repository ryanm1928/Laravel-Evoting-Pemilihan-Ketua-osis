@extends('template.layout')
@section('title','Tambah Pengguna')
@section('tambah','active-nav-item')
@section('content')
@if(session('erorr'))
<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ session('erorr') }}</div>
@else
<div class="alert alert-warning">
	<li class="fa fa-exclamation-triangle"></li> Untuk melakukan import data anda harus memahami syarat kententuan aplikasi,silahkan baca cara melakukan import data 
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<details>
	<summary class="h5">Cara Melakukan Import data</summary>
	<p class="text-dark">
		- Kami telah menyediakan file untuk anda isikan data user, berupa file excel <a href="unduh_file_users" style="text-decoration:underline" class="text-primary">ImportUser.osd</a>	
	</p>
	<p class="text-dark">
		- Silahkan click text bewarna biru di atas untuk mengunduh file
	</p>
	<p class="text-dark">
		- Jika file sudah berhasil di unduh silahkan buka file <span class="text-primary">ImportUser.osd</span> di Microsoft Excel
	</p>
	<p class="text-dark">
		- Jika sudah di buka maka anda akan melihat 4 buah header <span class="text-primary">id,username,password dan kelas_id</span>
		<img src="{{ asset('gambar/tutorial-1.jpg') }}" alt="" class="img-fluid mb-2 mt-2">
	</p>
	<p class="text-dark">
		- Ke 4 header tersebut tidak boleh di ubah ataupun di hapus hal ini dapat menyebabkan kegagalan pada saat mengimport data,
		ini berlaku juga untuk penambahan header di luar header yang di tentukan oleh aplikasi
	</p>
	<p class="text-dark">
		- Anda dapat mengisikan data user di bawah ke 4 header tersebut
	</p>
	<p class="text-dark">
		- Pada header <span class="text-primary">id</span> anda bisa isikan ID yang di gunakan user untuk login ke dalam aplikasi
		<img src="{{ asset('gambar/tutorial-2.jpg') }}" alt="" class="img-fluid mb-3 mt-3">
	</p>
	<p class="text-dark">
		- Pada header <span class="text-primary">username</span> anda bisa isikan nama akun yang di gunakan user 
		<img src="{{ asset('gambar/tutorial-3.jpg') }}" alt="" class="img-fluid mb-3 mt-3">
	</p>
	<p class="text-dark">
		- Pada header <span class="text-primary">password</span> anda bisa mengisikan Password yang di gunakan user untuk login ke dalam aplikasi
		<img src="{{ asset('gambar/tutorial-4.jpg') }}" alt="" class="img-fluid mb-3 mt-3">
	</p>
	<p class="text-dark">
		- Pada header <span class="text-primary">kelas_id</span> pengisian data tidak menggunakan nama kelas melainkan menggunakan id kelas yang anda buat di dalam aplikasi, untuk melihat id kelas silahkan unduh file berikut <a href="unduh_data_kelas" style="text-decoration:underline" class="text-primary">kelas.xlsx</a>	 <a href=""></a>
		<img src="{{ asset('gambar/tutorial-5.png') }}" alt="" class="img-fluid mb-3 mt-3">
	</p>

	<p class="text-dark">
		- Pengisian <span class="text-primary">kelas_id</span> di luar id yang ada anda buat akan menyebabkan kegagalan pada saat mengimport data
	</p>
	<p class="text-dark">
		- Setelah selesai mengisikan data save file tersebut 
	</p>
	<p class="text-dark">
		-Setelah selesai menginputkan data dan membaca syarat dan ketentuan <a class="text-primary" style="text-decoration:underline" data-toggle="modal" href='#modal-id'>Lakukan Import Data</a>
	</p>

	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h4 class="modal-title text-light">Import Data</h4>
					<div id="loading"></div>
				</div>
				<div class="modal-body">
					<form action="import" method="post" enctype="multipart/form-data" id="form-import">
						@csrf
						<div class="row">
							<div class="col-sm-12">
								<input type="file" name="data" class="form-control @error('title') is-invalid @enderror">

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="btn-close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="btn-import" type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Import Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</details>


<script type="text/javascript">
	$('#form-import').on('submit',function(){
		$('#btn-import').attr('disabled', 'true');
		$('#btn-close').css('display', 'none');
		$('#loading').html(`<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
			</div>`)
	});
</script>
@endsection