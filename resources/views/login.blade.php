@extends('template.login')

@section('title','Login')
@section('content')
<div class="row">
	<div class="col-sm-12">
		@if(session('status'))
		<div class="alert alert-danger w-100" style="position: absolute;"><li class="fa fa-exclamation-triangle"></li> {{session('status')}}</div>
		@endif
		@if(session('berhasil'))
		<div class="alert alert-success w-100" style="position: absolute;"><li class="fa fa-check-circle"></li> {{session('berhasil')}}</div>
		@endif
	</div>
	<div class="col-lg-6 mt-5">
		<img src="{{asset('gambar/aset1.png')}}" alt="" class="img-fluid">
	</div>
	<div class="col-lg-6 p-5">
		<div class="" id="form-login">
			<div class="h1 mb-4" style="font-style: bold;">E-Voting Login</div>
			<form action="/login" method="post" id="login-form">
				@csrf
				<div class=" mb-5">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="" id="basic-addon1"><li class="fa fa-user mr-2 mt-2"></li></span>
						</div>
						<input type="text" placeholder="Masukan id..." name="name" required="" class="form-control garis">
						@error('name')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
				</div>

				<div class="">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="bg-transparent" id="basic-addon1"><li class="fa fa-lock mr-2 mt-2"></li></span>
						</div>
						<input type="password" placeholder="Masukan sandi..." name="password" required="" class="form-control garis">
						@error('password')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
				</div>
				<button id="btn-login" type="submit" class="btn btn-primary mt-5 p-2 w-100"><li class="fa fa-key"></li> Login</button>
				<br>
			</div>
		</form>
		<div class="hilang" id="form-ganti">
			<form action="/gantisandi" method="post" id="gantisandi-form">
				@csrf
				<div class="h1 mb-3" style="font-style: bold;">Ubah Password</div>
				<div class=" mb-4">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="" id="basic-addon1"><li class="fa fa-user mr-2 mt-2"></li></span>
						</div>
						<input type="text" placeholder="Masukan username..." name="username" required="" class="form-control garis">
						@error('username')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
				</div>

				<div class="mb-4">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="bg-transparent" id="basic-addon1"><li class="fa fa-unlock mr-2 mt-2"></li></span>
						</div>
						<input type="password" placeholder="Masukan kata sandi lama..." name="old_password" required="" class="form-control garis">
						@error('old_password')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
				</div>
				<div class="">
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="bg-transparent" id="basic-addon1"><li class="fa fa-lock mr-2 mt-2"></li></span>
						</div>
						<input type="password" placeholder="Masukan kata sandi baru..." name="new_password" required="" class="form-control garis">
						@error('new_password')
						<div class="invalid-feedback">
							{{$message}}
						</div>
						@enderror
					</div>
				</div>
				<button id="btn-ganti" type="submit" class="btn btn-primary mt-5 p-2" style="width: 150px"><li class="fa fa-lock"></li> Ubah Password</button>
				<div class="btn btn-danger mt-5 p-2" style="width: 75px;" id="cancel">Cancel</div>
			</div>
		</form>

	</div>
</div>
<div class="row" id="foot-login">
	<div class="col-md-8 mt-5">
		<div class="text-primary d-inline" style="text-decoration:underline; cursor:pointer;">Buat akun?</div>
		<div class="text-primary d-inline" id="gantipw" style="text-decoration: underline; cursor:pointer;"> Ubah Password?</div>
	</div>
	<div class="col-md-4 mt-4" id="login-contact">
		<a href="https://web.facebook.com/profile.php?id=100010510620299" target="_blank"><img src="{{asset('gambar/socialmediaicon_01.png')}}" alt="" style="width: 38px"></a>
		<a href="https://api.whatsapp.com/send/?phone=6289513653977&text&app_absent=0" target="_blank"><img src="{{asset('gambar/socialmediaicon_06.png')}}" alt="" style="width: 38px"></a>
		<a href="https://www.instagram.com/riyan.rar/" target="_blank"><img src="{{asset('gambar/socialmediaicon_09.png')}}" alt="" style="width: 38px"></a>
		<a href="https://github.com/ryanm1928?tab=repositories" target="_blank"><img src="{{asset('gambar/socialmediaicon_20.png')}}" alt="" style="width: 38px"></a>
		<div class="text text-muted" style="font-size: 13px">made by MOHAMAD RIYAN</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#gantipw').click(function(event) {

			$('#form-login').slideUp(1000);

			$('#form-ganti').slideDown(3000);
			
			
		});

		$('#cancel').click(function(event) {
			$('#form-ganti').slideUp(1000);
			$('#form-login').slideDown(2000);

			
		});


		$('#login-form').on('submit',function(){
			$('#btn-login').attr('disabled', 'true');

		});

		$('#gantisandi-form').on('submit',function(){
			$('#btn-ganti').attr('disabled', 'true');
			$('#cancel').css('display', 'none');

		});



	});
</script>
@endsection