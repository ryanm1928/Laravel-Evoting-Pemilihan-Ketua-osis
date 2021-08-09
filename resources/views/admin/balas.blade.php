

<div class="table-primary p-3 mb-3" align="left">
	<div class="h4"> {{$mail->user->username}}:</div>
	<div class="h6"><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$mail->pesan}}</div>
</div>
<form action="/sendreply" method="post" id="form-balas">
	@csrf
	<textarea name="balaspesan" id="" cols="10" rows="2" class="form-control" placeholder="Tulis balasan di sini..." required=""></textarea>
	<input type="hidden" value="{{$mail->user_id}}" name="user">
	<input type="hidden" value="{{$mail->id}}" name="idpesan">
	<div class="modal-footer">
		<button id="btn-cancel" type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Kembali</button>
		<button id="btn-balas" type="submit" class="btn btn-primary mt-3" style="width: 130px;"><li class="fa fa-paper-plane"></li> Balas</button>
	</div>
	
</form>


<script type="text/javascript">
	$('#form-balas').on('submit',function(){
		$('#btn-balas').attr('disabled', 'true');
		$('#btn-cancel').css('display', 'none');

	});
</script>


