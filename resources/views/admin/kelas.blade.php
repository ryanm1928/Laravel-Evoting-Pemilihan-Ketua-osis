@extends('template.layout')
@section('title','Kelas')
@section('kelas','active-nav-item')
@section('content')
<div class="container">
	<div class="row" id="kelas-header">
		<div class="col-lg-6 mb-3">
			<form action="" method="get" id="form-kelas">
				@csrf
				<div class="row">
					<div  class="col-lg-8">
						<select name="kelas" id="" class="form-control  w-100 d-inline my-2">
							<option value="" selected="" ><span class="text-muted">Pilih kelas</span></option>
							@foreach($kelas as $datakelas)
							<option value="{{ $datakelas->id }}">{{ $datakelas->kelas }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-4 mt-2">
						<button id="btn-kelas" class="btn btn-info w-100" type="submit"><li class="fa fa-search"></li> Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div id="result-text-print" class="h3">Data siswa:</div>

	<div>
		<div class="table-responsive mt-3">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Kelas</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					@if($request->kelas == 0)
					<tr>
						<td class="text-muted">
							Pilih kelas terlebih dahulu
						</td>
					</tr>
					@else
					@if($data->count() == 0)
					<td class="text-muted">Data kosong</td>
					@endif
					@foreach($data as $class)
					<tr>
						<th scope="row">{{ $loop->iteration }}</th>
						<td>{{ $class->username }}</td>
						<td>{{ $class->userkelas->kelas }}</td>
						@if($class->voteuser->count() == 1)
						<td class="h6 text-success table-success" >Sudah Voting <i class="fa fa-check-circle" aria-hidden="true"></i> </td>
						@else
						<td class=" h6 text-danger table-danger" >Belum Voting</td>
						@endif
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#form-kelas').on('submit',function(){
		$('#btn-kelas').attr('disabled', 'true');

	});
</script>
@endsection