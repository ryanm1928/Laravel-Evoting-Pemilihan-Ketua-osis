@extends('template.layout')
@section('title','Hasil Voting')
@section('lihat','active-nav-item')
@section('content')
<div class="h3">Hasil Voting</div>
@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}</div>
@endif



<div class="table-responsive">
	<table class="table table-bordered table-hover shadow">
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
		<tbody>
			@foreach($poll as $data)
			<tr>
				<th>{{$loop->iteration}}</th>
				<th>{{$data->title}}</th>
				<th>{{$data->description}}</th>
				<th>{{$data->deadline}}</th>
				<th><a href="/result/{{$data->id}}" class="text-primary"><i class="fa fa-eye" aria-hidden="true"></i>  Lihat hasil</a></th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection