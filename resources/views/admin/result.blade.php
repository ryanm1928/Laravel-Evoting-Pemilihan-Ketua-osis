<div class="row">
	<div class="col-xl-4 mb-2 text-light " id="userdata">
		<div class="bg-primary p-2 shadow">
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$datapemilih}}</div>
					Pengguna
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
			</div>
		</div>
	</div>
	<div class="col-xl-4 mb-2 " id="usertimes">
		<div class="bg-danger text-light p-2" shadow>
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$datapemilih - $vote}}</div>
					Belum Voting
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
				<td><img src="{{asset($item->sampul)}}" alt="" width="120px"></td>
				<td class="h5">{{$item->name}}</td>
				<td class="h5"><li class="fa fa-users"></li> {{$item->vote->count()}}</td>
				@if($data->vote->count())
				
				<td class="h5" width="130px">{{round($item->vote->count() / $datapemilih * 100,2)}}%</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
