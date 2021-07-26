@foreach($poll as $data)
<form action="{{route('poll.destroy',['poll' => $data->id])}}" method="post" class="d-inline" id="form-delete"> 
	@csrf
	@method('delete')
	<div class="alert alert-danger" align="center">Anda yakin ingin menghapus:</div>
	<div class="" align="center">
		<li class="fa fa-5x fa-exclamation-triangle text-danger mb-4 mt-2"></li><br>
		{{$data->title}}
	</div>
	<div class="modal-footer">
		<button id="btn-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button id="btn-delete" type="submit" class="btn btn-danger" style="width: 130px;"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
	</div>
	
</form>

<script type="text/javascript">
	$('#form-delete').on('submit',function(){
		$('#btn-delete').attr('disabled', 'true');
		$('#btn-cancel').css('display', 'none');
	});
</script>

@endforeach