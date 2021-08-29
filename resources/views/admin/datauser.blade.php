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
	<div class="col-sm-10 mb-2 input-group">
		<div class="input-group-prepend">
			<span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search" aria-hidden="true"></i></span>
		</div>
		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cari" id="cari" placeholder="Search..">
	</div>
	<div class="col-sm-2">
		<button id="btn-cari" class="btn btn-info w-100"><li class="fa fa-search"></li> Cari</button>
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
		$('#table').html(`
			<div class="spinner-border text-primary" role="status"></div><span class="h5"> Memuat data..</span>`)
		userdata()
		datavoteuser()
	})

	$('#btn-cari').click(function(event) {
		$('#table').html(`
			<div class="spinner-border text-primary" role="status"></div><span class="h5"> Memuat data..</span>`)
		if($('#cari').val() == "")
		{
			userdata();
		}else{
			search()

		}
		

	});

	function datavoteuser()
	{
		$.get("{{url('datavoteuser')}}/", function(data) {
			$("#datavoteuser").html(data);
		});
	}

	function search()
	{
		$.ajax({
			type : "get",
			url : "{{url('userdata')}}",
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