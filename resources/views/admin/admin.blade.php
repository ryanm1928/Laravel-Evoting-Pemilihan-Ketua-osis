@extends('template.layout')
@section('title','Admin Dashboard')
@section('home','active-nav-item')

@section('content')

@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}</div>
@endif
@if(session('delete'))
<div class="alert alert-danger"><li class="fa fa-trash"></li> {{session('delete')}}</div>
@endif
<div class="h3">Data Voting</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover ">
		<caption>Made by MOHAMAD RIYAN</caption>
		<thead class="thead-dark">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Judul</th>
				<th scope="col">Deskripsi</th>
				<th scope="col">Batas Waktu</th>
				<th scope="col">Dibuat oleh</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($poll as $data)

			<tr>
				<td>{{$loop->iteration}}</td>
				<td align="center">{{$data->title}}</td>
				<td align="center">{{$data->description}}</td>
				<td align="center">{{$data->deadline}}</td>
				<td>{{$data->creator->name}}</td>
				<td>
					<a onClick="hapus({{$data->id}})" class="btn btn-danger" data-toggle="modal" href='#modal-id' style="width: 130px;"><li class="fa fa-trash"></li> Hapus</a>
					<br>
					<a style="width: 130px;" href="{{route('poll.edit',['poll' => $data->id])}}" class="btn btn-warning text-light mt-2 "><i class="fa fa-edit" aria-hidden="true"></i> Edit data</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger text-light">
				<h4 class="modal-title">Peringatan</h4>
				<button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function hapus(id)
	{
		$.get("{{url('polldelete')}}/" + id, function(data,status) {
			$('.modal-body').html(data);
		});
	}
</script>
@endsection