<div class="row">
	<div class="col-xl-4 mt-2 " id="userdata">
		<div class="btn-primary p-3 shadow">
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
	<div class="col-xl-4 mt-2 " id="usercheck">
		<div class="btn-success text-light p-3 shadow">
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
	<div class="col-xl-4 mt-2 " id="usertimes">
		<div class="btn-danger text-light p-3" shadow>
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

<script type="text/javascript">
	$('#usercheck').click(function(event) {
		$.get("{{url('voteusercheck')}}", function(data) {
			$('#table').html(data)
			datavoteuser();
		}); 
	});

	$('#usertimes').click(function(event) {
		$.get("{{url('voteusertimes')}}", function(data) {
			$('#table').html(data);
			datavoteuser();
		}); 
	});

	$('#userdata').click(function(event) {
		userdata();
		datavoteuser();
	});
</script>