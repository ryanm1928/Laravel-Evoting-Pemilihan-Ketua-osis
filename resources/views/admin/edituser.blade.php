
<div class="container">
	<form action="/datauser/edit/{{$user->id}}" method="post" id="form-edit-user">
		@csrf
		@method('put')
		<div class="row">
			<div class="col-sm-12">
				<label for=""><i class="fa fa-user" aria-hidden="true"></i> Masukan nama baru :</label>
				<input type="text" placeholder="Masukan username..." name="username" class="form-control" value="{{$user->username}}">
			</div>

			<div class="col-sm-12 mt-3">
				<label for=""><i class="fa fa-user" aria-hidden="true"></i> Masukan Id baru :</label>
				<input type="text" placeholder="Masukan ID..." name="nama" class="form-control" value="{{$user->name}}">
			</div>
			<div class="col-sm-12 mt-3">
				<label for=""> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Masukan Password baru:</label>
				<input type="text" placeholder="Masukan Sandi..." name="password" class="form-control" value="">
			</div>
	</div>
	<div class="modal-footer">
		<button id="btn-kembali" type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
		<button id="btn-edit-user" class="btn btn-success" type="submit"><i class="fa fa-save" aria-hidden="true"></i> Simpan</button>
	</div>

</form>

</div>


<script type="text/javascript">
	$('#form-edit-user').on('submit',function(){
		$('#btn-edit-user').attr('disabled', 'true');
		$('#btn-kembali').css('display', 'none');

	});
</script>