@extends('templateuser.layout')
@section('title','Vote')
@section('content')
<div class="alert alert-primary">
	<li>Click pada gambar calon untuk memilih</li>
</div>
<div class="table-responsive">
	<table class="table table-striped shadow">
		<thead class="thead-dark">
			<tr>
				<th scope="col"><center>SILAHKAN PILIH</center></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="p-1">
					<div class="row">
						@foreach($poll->choice as $data)
						<div class="col-sm-4 mb-4" id="paslon">
							<center>
								<div class="h3">{{$loop->iteration}}</div>
								<a onClick="uservote({{$data->id}})" data-toggle="modal" href='#modal-id'><img src="{{asset($data->sampul)}}" alt="" class="w-50 mb-1"></a>
								<hr>
								<div class="h6">VISI:</div> 
								<div class="mb-2 mx-3" align="center">{{$data->visi}}</div>
								<div class="h6">MISI:</div> 
								<div class="mx-3" align="center">{{$data->misi}}</div>
								
							</center>
						</div>
						<hr>
						@endforeach
						<?php
						$max = 6;
						$jlm = $max - $hitung;
						?>
						@for($i=0 ; $i < $jlm ; $i++)

						<div class="col-sm-4 mt-5 mb-3" id="img-none">
							<center>
								<button type="submit" class="bg-transparent" style="border:none;outline: none;"><img src="{{asset('gambar/deafult.png')}}" alt="" class="w-50"></button>
								<i class="fa fa-2x fa-ban mt-3" aria-hidden="true"></i>
							</center>
						</div>
						@endfor
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h4 class="modal-title text-light">Vote</h4>
					<button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

				</div>

			</div>
		</div>
	</div>

	<div style="margin-bottom: 100px;"></div>
</div>
<script type="text/javascript">
	$('.modal-body').html('<div class="h4 mt-2">Memuat data..</div>');
	function uservote(id){
		$.get("{{url('vote/')}}/"+id,{}, function(data,status) {
			
			$('.modal-body').html(data);
		});
	}
</script>

@endsection
