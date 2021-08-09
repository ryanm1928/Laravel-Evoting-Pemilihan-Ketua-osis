@extends('template.layout')
@section('title','Pesan')
@section('pesan','active-nav-item')
@section('content')
<div class="h3">Pesan</div>
<hr>
@if($mail->count() == 0)
<div class="alert alert-warning"><li class="fa fa-envelope"></li> Pesan kosong</div>
@else
@if(session('status'))
<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> {{session('status')}}
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="row">
	@foreach($mail as $pesan)
	<div class="col-sm-12 mb-4">
		<div class="h3"></div>
		<div class="table-primary p-4">
			<div class="mb-2"> <span class="h5"><i class="fa fa-user" aria-hidden="true"></i> {{$pesan->user->username}} :</span></div>
			<div class="mx-2">{{$pesan->pesan}}</div>
			

			<div class="row mt-2">
				<div class="col-sm-9">
					@if($pesan->balas->count() >= 1)
					<li class="fa fa-check-circle text-primary"></li> <a data-toggle="modal" href='#modal-id' onclick="reply('{{$pesan->id}}')" class="text-primary" style="text-decoration: underline;">Dibalas</a> 
					@else
					<li class="fa fa-reply text-secondary"></li> <a class="text-muted" data-toggle="modal" href='#modal-id' onclick="reply('{{$pesan->id}}')" >Balas</a>
					@endif
				</div>
				<div class="col-sm-3">
					<div class="text-muted mt-2" style="font-size: 15px">{{$pesan->tanggal}} <span class="h5">||</span>
						{{$pesan->waktu}}
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endif


<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="  background-color: #0f8cba;">
				<h4 class="modal-title  text-light">Balas</h4>
				<button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function reply(id){
		$.get("{{url('reply')}}/ " + id,{}, function(data,status) {
			$('.modal-body').html(data)
		});
	}
</script>
@endsection