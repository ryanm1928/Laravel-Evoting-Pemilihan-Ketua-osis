<center>
	@if($vote->count() == 0)
	<h1 class="">404 Not found</h1>
	@else
	<div class="alert alert-warning"><center>Anda ingin Memilih:</center></div>
	@foreach($vote as $data)
	<form action="" method="post" id="form-vote">
		@csrf
		<div class="h4 mb-3">{{$data->name}}</div>
		<img src="{{asset($data->sampul)}}" alt="" class="shadow mb-2" width="165px">
		<input type="hidden" value="{{$data->id}}" name="userchoice">
		<div class="mb-1" align="center"><span class="h6">VISI:</span> {{$data->visi}}</div>
		<div class="" align="center"><span class="h6">MISI:</span> {{$data->misi}}</div>
		<div class="modal-footer mt-3 mr-auto">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
			<button type="submit" class="btn btn-primary" style="width: 120px" id="btn-vote">Pilih</button>
		</div>
	</form>

	
</center>
@endforeach
<script type="text/javascript">
	$('#form-vote').on('submit',function(){
		$('#btn-vote').attr('disabled', 'true');

	});
</script>
@endif