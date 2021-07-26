<table class="table table-bordered table-hover">
	<thead class="thead-dark">
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">Kelas</th>
			<th scope="col">Status</th>
			<th scope="col">Action</th>

		</tr>
	</thead>
	<tbody>

		@foreach($data as $user)
		<tr>
			<td scope="row">{{$loop->iteration}}</td>
			<td class="w-25">{{$user->name}}</td>
			<td style="width: 150px;">{{$user->userkelas->kelas}}</td>
		</td>
		@if($user->voteuser->count() >= 1)
		<td class=" h6 text-success table-success" >Sudah Voting <i class="fa fa-check-circle" aria-hidden="true"></i> </td>
		@else
		<td class=" h6 text-danger table-danger" >Belum Voting <i class="fa fa-window-close" aria-hidden="true"></i></td>
		@endif
		<td>
			
			<form action="datauser/{{$user->id}}" method="post" class="d-inline"> 
				@csrf
				@method('delete')
				<button type="submit" class="btn btn-danger mb-2" style="width: 120px;"><i class="fa fa-trash" aria-hidden="true"></i> Hapus
				</button>
			</form>
			
			
			@if($user->voteuser->count() == 1)
			<a style="width: 120px;" href="datauser/{{$user->id}}" class="btn btn-success text-light mb-2"><i class="fa fa-eye" aria-hidden="true"></i>  Details</a>
			@else
			<button style="width: 120px;background-color: #BCBCBC;" class="btn mb-2"><i class="fa fa-ban" aria-hidden="true"></i></button>
			@endif
			<a style="width: 120px;" href="datauser/edit/{{$user->id}}" class="btn btn-warning text-light mb-2"><i class="fa fa-edit" aria-hidden="true"></i> Edit data</a>
		</td>
	</tr>
	@endforeach
</tbody>
</table>


