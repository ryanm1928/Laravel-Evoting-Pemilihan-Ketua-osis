@extends('template.layout')
@section('title','Data User')
@section('datauser','active-nav-item')
@section('content')



@if(session('delete'))
<div class="alert alert-danger"><li class="fa fa-trash"></li> {{session('delete')}}</div>
@endif
@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}</div>
@endif

<div class="h3">Daftar Pengguna:</div>
<div class="row">
	<div class="col-sm-10 mb-2">
		<form action="/datauser">
			<input type="search" class="form-control shadow" name="cari" placeholder="🔎 Cari pengguna..." value="{{$request->cari}}">

		</div>
		<div class="col-sm-2">
			<button type="submit" class="btn btn-success" style=" width: 130px"><i class="fa fa-search" aria-hidden="true"></i>Cari</button>
		</div>
		
	</form>
</div>
<hr>

<div class="row">
	<div class="col-sm-4 mt-2 ">
		<div class="bg-primary text-light p-3 shadow">
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$datapemilih}}</div>
					Pengguna
				</div>
				<div class="col-sm-3">
					<i class="fa fa-5x fa-users" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4 mt-2 ">
		<div class="bg-success text-light p-3 shadow">
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$vote}}</div>
					Sudah Voting
				</div>
				<div class="col-sm-3">
					<i class="fa fa-5x fa-users" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4 mt-2 ">
		<div class="bg-danger text-light p-3" shadow>
			<div class="row">
				<div class="col-sm-7">
					<div class="h3"> {{$datapemilih - $vote}}</div>
					Belum Voting
				</div>
				<div class="col-sm-3">
					<i class="fa fa-5x fa-users" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="table-responsive mt-2">
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
			@if($user->voteuser->count() == 1)
			<td class=" h6 text-success table-success" >Sudah Voting <i class="fa fa-check-circle" aria-hidden="true"></i> </td>
			@else
			<td class=" h6 text-danger table-danger" >Belum Voting <i class="fa fa-window-close" aria-hidden="true"></i></td>
			@endif
			<td>
				
				<form action="datauser/{{$user->id}}" method="post" class="d-inline"> 
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-danger" style="width: 120px;"><i class="fa fa-trash" aria-hidden="true"></i> Hapus
					</button>
				</form>
				
				
				@if($user->voteuser->count() == 1)
				<a style="width: 120px;" href="datauser/{{$user->id}}" class="btn btn-success text-light"><i class="fa fa-eye" aria-hidden="true"></i>  Details</a>
				@else
				<button style="width: 120px;background-color: #BCBCBC;" class="btn"><i class="fa fa-ban" aria-hidden="true"></i></button>
				@endif
				<a style="width: 120px;" href="datauser/edit/{{$user->id}}" class="btn btn-warning text-light"><i class="fa fa-edit" aria-hidden="true"></i> Edit data</a>
			</td>
		</tr>
	</tbody>
	@endforeach
</tbody>
</table>
</div>
<style>
	.w-5{
		display: none;
	}
</style>
@endsection