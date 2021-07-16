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
	<table class="table table-bordered table-hover shadow">
		<caption>Made by MOHAMAD RIYAN</caption>
		<thead class="thead-dark">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Title</th>
				<th scope="col">Description</th>
				<th scope="col">Deadline</th>
				<th scope="col">Be made by</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($poll as $data)

			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$data->title}}</td>
				<td>{{$data->description}}</td>
				<td>{{$data->deadline}}</td>
				<td>{{$data->creator->name}}</td>
				<td>
					<form action="{{route('poll.destroy',['poll' => $data->id])}}" method="post" class="d-inline"> 
						@csrf
						@method('delete')
						<button type="submit" class="btn btn-danger" style="width: 120px;"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
					</form>
					<br>
					<a style="width: 120px;" href="{{route('poll.edit',['poll' => $data->id])}}" class="btn btn-warning text-light mt-2 "><i class="fa fa-edit" aria-hidden="true"></i> Edit data</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- Modal -->
	
	@endsection