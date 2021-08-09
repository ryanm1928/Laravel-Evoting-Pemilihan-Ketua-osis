<table class="table table-bordered table-hover">
	<thead class="bg-success text-light">
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">Id</th>
			<th scope="col">Kelas</th>
			<th scope="col">Status</th>
			<th scope="col">Action</th>

		</tr>
	</thead>
	<tbody>

		@foreach($data as $user)
		<tr>

			@if($user->voteuser->count() >= 1)
			<td scope="row">{{$loop->iteration}}</td>
			<td style="width: 350px">{{$user->username}}</td>
			<td>{{ $user->name}}</td>
			<td style="width: 150px;">{{$user->userkelas->kelas}}</td>
			<!-- status -->
			<td class=" h6 text-success table-success" >Sudah Voting <i class="fa fa-check-circle" aria-hidden="true"></i> </td>

			<!-- tombol -->
			@if($user->role == 'admin')
			<td>
				<button class="btn btn-default text-primary mb-2 mt-2 w-100" data-toggle="modal" href='#modal-id-1'onclick="edituser('{{$user->id}}')" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit admin</button>
			</td>
			@else
			<td>
				<form action="datauser/{{$user->id}}" method="post" class="d-inline"> 
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-outline-danger mb-2" data-placement="right" title="Hapus"><i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</form>

				@if($user->voteuser->count() == 1)
				<button  class="btn btn-outline-success  mb-2" data-placement="right" title="Details" data-toggle="modal" href='#modal-id-2' onclick="getdetails('{{$user->id}}')"><i class="fa fa-eye" aria-hidden="true"></i> </button>
				@else
				<button style="background-color: #BCBCBC;" class="btn mb-2"><i class="fa fa-ban" aria-hidden="true"></i></button>
				@endif
				<button class="btn btn-outline-warning mb-2" data-toggle="modal" href='#modal-id-1'onclick="edituser('{{$user->id}}')" data-placement="right" title="Edit Pengguna"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
			</td>
			@endif  	<!-- tombol -->
			@endif      <!-- status -->
			@endforeach
			
			
		</tr>
		
	</tbody>
</table>


