@extends('template.layout')
@section('title','Statistik Pengguna')
@section('datauser','active-nav-item')
@section('content')

@if(session('delete'))
<div class="alert alert-danger"><li class="fa fa-trash"></li> {{session('delete')}}
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="row">
	<div class="col-sm-11 mb-2">
		<input type="text" class="form-control" name="cari" id="cari" placeholder="🔎 Cari pengguna...">
	</div>
	<div class="col-sm-1">
		<a href="/datauser"><li class="fa fa-2x fa-retweet text-muted" aria-hidden="true" title="Refresh"></li></a>
	</div>
</div>
<hr>

<div id="datavoteuser"></div>

<div class="table-responsive mt-2" id="table"></div>

<div class="modal fade" id="modal-id-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h4 class="modal-title ">Edit Pengguna:</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="h4 mt-2"><li class="fa fa-search"></li> Memuat data..</div>
			</div>
			
		</div>
	</div>
</div>



<div class="modal fade" id="modal-id-2">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h4 class="modal-title text-light">Details</h4>
				<button type="button" class="close text-light" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body-2">
				<div class="h4 mt-2"><li class="fa fa-search"></li> Memuat data..</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>

<!-- load -->

<script type="text/javascript">

	$(window).on('load',function(){
		$('#table').html(`<center>
			<div class="spinner-border text-primary" role="status"></div><span class="h5"> Memuat data..</span>
			</center>`)
		userdata()
		datavoteuser()
	})

	$('#cari').keyup(function(event) {
		$('#table').html(`<center>
			<div class="spinner-border text-primary" role="status"></div><span class="h5"> Memuat data..</span>
			</center>`)
		if($('#cari').val() == "")
		{
			userdata();
		}else{
			search()

		}
		

	});

	function datavoteuser()
	{
		$.get("{{url('datavoteuser')}}", function(data) {
			$("#datavoteuser").html(data);
		});
	}

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


	function edituser(id) {

		$.get("{{url('datauser/edit')}}/" + id,{}, function(data,status) {	
			$('.modal-body').html(data)
		});
	}

	function getdetails (id) {

		$.get("{{url('datauser')}}/" + id, function(data) {
			$('.modal-body-2').html(data)
		}); 
	}

	

	
</script>


@endsection