@extends('template.layout')
@section('title','Hasil Voting')
@section('lihat','active-nav-item')
@section('content')
<div class="h3" id="result-text">Hasil Voting</div>
<center>
	<div class="h3" id="result-text-print">Hasil Voting</div>
</center>
<hr>
@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="table-responsive" id="data" >
	<table class="table table-bordered table-hover">
		<caption>Made by MOHAMAD RIYAN</caption>
		<thead class="thead-dark">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Title</th>
				<th scope="col">Description</th>
				<th scope="col">Deadline</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody  >
			@foreach($poll as $data)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td align="center">{{$data->title}}</td>
				<td align="center">{{$data->description}}</td>
				<td align="center">{{$data->deadline}}</td>
				<td align="center"><button class="btn btn-outline-primary" onclick="hasil('{{$data->id}}')" data-placement="right" title="Lihat hasil"><i class="fa fa-eye" aria-hidden="true"></i> </button class="btn btn-warning text-light"></th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<script type="text/javascript">


		function hasil(id)
		{		
			var j=0;
			setInterval(function () {
				j++;
				if(j == 1){
					$.get("{{url('result')}}/ " + id,{}, function(data,status) {
						$('#data').html(data)
					});
					j = 0;
				}
			},2000);


		}
	</script>

	@endsection