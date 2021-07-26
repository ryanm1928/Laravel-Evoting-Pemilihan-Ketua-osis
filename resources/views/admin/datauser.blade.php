@extends('template.layout')
@section('title','Statistik Pengguna')
@section('datauser','active-nav-item')
@section('content')

@if(session('delete'))
<div class="alert alert-danger"><li class="fa fa-trash"></li> {{session('delete')}}</div>
@endif
@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}</div>
@endif
<div class="row">
	<div class="col-sm-11 mb-2">
		<input type="text" class="form-control" name="cari" id="cari" placeholder="🔎 Cari pengguna...">
	</div>
	<div class="col-sm-1">
		<a href="/datauser"><li class="fa fa-2x fa-retweet text-muted" aria-hidden="true"></li></a>
	</div>
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

<div class="table-responsive mt-2" id="table">
	
</div>

<!-- load -->

<script type="text/javascript">

	$(window).on('load',function(){
		$('#table').html('<div class="h4 mt-2"><li class="fa fa-search"></li> Memuat data..</div>')
		userdata()
	})

	$('#cari').keyup(function(event) {
		$('#table').html('<div class="h4 mt-2"><li class="fa fa-search"></li> Memuat data..</div>')
		if($('#cari').val() == "")
		{
			userdata();
		}else{
			search()

		}
		

	});

	function search()
	{
		$.ajax({
			type : "get",
			url : "{{url('cari')}}",
			data : "cari= " + $('#cari').val(),
			success :function(data){

				$('#table').html(data);
			}
		})
	}
	
	function userdata(){
		$.get("{{url('userdata')}}",{}, function(data,status) {
			$('#table').html(data);
		});
	}

	
</script>



@endsection