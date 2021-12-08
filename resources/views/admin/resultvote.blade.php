@extends('template.layout')
@section('title','Hasil Voting')
@section('lihat','active-nav-item')
@section('content')
<div class="h3" id="result-text">Hasil Voting</div>
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
				<td align="center"><a href="/result/{{ $data->id }}" class="btn btn-outline-primary" data-placement="right" title="Lihat hasil"><i class="fa fa-eye" aria-hidden="true"></i> </a class="btn btn-warning text-light"></th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection