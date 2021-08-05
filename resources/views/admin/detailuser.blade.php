

<div class="container table-responsive mt-2">
	<table class="table table-bordered table-hover">
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
				<td>{{$user->username}}</td>
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
