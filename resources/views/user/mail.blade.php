@extends('templateuser.layout')
@section('title','Kirim Pesan')

@section('content')

<div  class="container">
	<div class="row">
		<div class="col-sm-12">
			<form action="/send-mails" method="post" id="form-pesan">
				@csrf
				<div  class="row">
					<label for="">Tulis pesan beserta No telepon anda ( Admin akan megirim konfirmasi ke no Whatsapp anda )</label>
					<textarea placeholder="08x-xxx-xxx ~ Pesan" name="pesan" id="" cols="30" rows="10" class="form-control" required=""></textarea>
					<button id="btn-pesan" type="submit" class="btn btn-primary mt-3" style="width: 100%;"><span id="text-pesan"><li class="fa fa-paper-plane"></li> Kirim Pesan</span></button>
				</div>

			</form>
		</div>
		@foreach($reply as $data)
		<div class="col-sm-12 alert alert-success mt-4">
			<div class="h5" align="left"><i class="fa fa-reply-all" aria-hidden="true"></i> {{$data->mails->pesan}},</div>
			<div class="mx-4 mt-2" style="font-size: 17px"> {{$data->balasan}}</div>

			<div class="row mt-2">
				<div class="col-sm-10">
					<div class="text-muted" style="font-size: 14px;">Dibalas oleh admin</div>
				</div>
				<div class="col-sm-2">
					<div class="text-muted mt-2" style="font-size: 15px"> {{$data->tanggal}} <span class="h5">||</span> {{$data->waktu}}</div>
				</div>
			</div>
		</div>
		@endforeach	
	</div>
</div>

<script type="text/javascript">
	$('#form-pesan').on('submit',function(){
		$('#btn-pesan').attr('disabled', 'true');

	});
</script>

<div style="margin-bottom: 120px"></div>
@endsection