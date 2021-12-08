@extends('template.layout')
@section('title','Hasil Voting')
@section('lihat','active-nav-item')
@section('content')
<div id="result-text">
	<div class="h3">Hasil Voting
		<a href="" title="Refresh"><li class=" fa fa-refresh"></li></a>
	</div>
<div style="font-size: 15px" class="text-secondary">*Tekan icon refresh untuk melihat data baru</div>
</div>
<center>
	<div class="h3" id="result-text-print">Hasil Voting</div>
</center>
<hr>
<div class="row">
	<div class="col-xl-4 mb-2 text-light " id="userdata">
		<div class="bg-primary p-2 shadow">
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$datapemilih}}</div>
					Pengguna
				</div>
				<div class="col-sm-3 mt-3">
					<div class="h3">100%</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 mb-2 " id="usercheck">
		<div class="bg-success text-light p-2 shadow">
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$vote}}</div>
					Sudah Voting 
				</div>
				<div class="col-sm-3 mt-3">
					<div class="h3">{{ round($vote / $datapemilih * 100,2) }}%</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 mb-2 " id="usertimes">
		<div class="bg-danger text-light p-2" shadow>
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$bv =  $datapemilih - $vote}}</div>
					Belum Voting 
				</div>
				<div class="col-sm-3 mt-3">
					<div class="h3">{{ round($bv / $datapemilih * 100,2) }}%</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<caption>Made by MOHAMAD RIYAN</caption>
		<thead class="thead-dark">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Sampul</th>
				<th scope="col">Nama</th>
				<th scope="col">Jumlah Pemilih</th>
				<th scope="col">Hasil</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data->choice as $item)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td><img src="{{asset($item->sampul)}}" alt="" width="200"></td>
				<td class="h5">{{$item->name}}</td>
				<td class="h5"><li class="fa fa-users"></li> {{$item->vote->count()}}</td>
				@if($data->vote->count() == 0)
				<td class="h5">0%</td>
				@else
				<td class="h5" width="130px">{{round($item->vote->count() / $datapemilih * 100,2)}}%</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection