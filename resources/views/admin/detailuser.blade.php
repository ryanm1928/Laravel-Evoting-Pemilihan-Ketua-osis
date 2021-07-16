@extends('template.layout')
@section('title','Details User')
@section('datauser','active-nav-item')
@section('content')
<div class="h3">Details:</div>

<div class="table-responsive">
	<table class="table table-bordered table-hover shadow">
		<caption>Made by MOHAMAD RIYAN</caption>
		<thead class="thead-dark">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama</th>
				<th scope="col">Polling</th>
				<th scope="col">Memilih</th>
				<th scope="col">Sampul</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>{{$user->name}}</td>
				@foreach($vote as $data)
				<td>{{$data->polling->title}}</td>
				<td>
					<div class="h5">{{$data->choice->name}}</div>
				</td>
				<td>
					<img src="{{asset($data->choice->sampul)}}" alt="" width="80px">
				</td>
				@endforeach
			</tr>
		</tbody>
	</table>
</div>
@endsection