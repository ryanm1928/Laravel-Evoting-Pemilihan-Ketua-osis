@extends('template.layout')
@section('title','Update Polling')
@section('home','active-nav-item')
@section('content')
<div class="h3">Update Data Polling</div>
<hr>
<form action="{{route('poll.update',['poll' => $id->id])}}" method="post" id="form-edit-poll">
	@csrf
	@method('put')
	<div class="row">
		<div class="col-sm-6">
			<label for="">Masukan judul baru:</label>
			<input type="text" name="title" value="{{$id->title}}" class="form-control" required="">
		</div>
		<div class="col-sm-6 ">
			<label for="">Masukan deadline baru:</label>
			<input type="date" name="deadline" value="{{date('Y-m-d').strtotime('$id->deadline')}}" class="form-control" required="">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 mt-3">
			<label for="">Masukan deskripsi baru: </label>
			<textarea name="description" cols="20" rows="10" class="form-control" required="">{{$id->description}}</textarea>
		</div>
	</div>
	<button id="btn-edit-poll" type="submit" class="btn btn-success w-100 mt-3"><i class="fa fa-edit" aria-hidden="true"></i> Edit data Voting</button>
</form>


<div class="h3 mt-4">Update Kadidat</div>
<hr>
<div class="table-responsive">
	<table class="table">
		<caption>Made by MOHAMAD RIYAN</caption>
		<thead class="thead-dark">
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama</th>
				<th scope="col">Sampul</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($id->choice as $choice)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$choice->name}}</td>
				<td><img src="{{asset($choice->sampul)}}" alt="" style="width: 70px;"></td>
				<td>
					<a href="/editchoice/{{$choice->id}}" class="btn-choice btn btn-warning text-light"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
				</td>
			</tr>
			@endforeach	
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#form-edit-poll').on('submit',function(){
		$('#btn-edit-poll').attr('disabled', 'true');
		$('.btn-choice').attr('disabled', 'true');

	});
</script>
@endsection
