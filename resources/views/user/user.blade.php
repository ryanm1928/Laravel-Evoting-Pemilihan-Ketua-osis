@extends('templateuser.layout')
@section('title','E-Voting')
@section('content')

@if(session('pesan'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('pesan')}}
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
@if($deadline >= 1)
@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@else
	<marquee class="alert alert-warning"><li class="fa fa-exclamation-triangle"></li> Voting akan hilang jika batas waktu telah berahir / admin mengahapus data voting</marquee>
@endif

@foreach($poll as $data)
<div class="row bg-primary user-content shadow mb-3">
	<div class="col-xl-7 p-5">
		<div class="h2 text-light" align="left" id="title">{{$data->title}}</div>
		<div class="text mb-3 mt-3 text-light" style="font-size: 15px"><li>{{$data->description}}</li></div>
		<div class="text-light"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></li> Batas waktu sampai:</div>
		<div class="text-light h6">{{$data->deadline}}</div>
	</div>
	<div class="col-xl-5 p-5" id="icon">
		<center>
			<li class="fa fa-user text-dark" style="opacity: 0.5;" id="user-icon"></li>
			<li class="fa fa-user text-dark" style="opacity: 0.5;" id="user-icon"></li>
			<li class="fa fa-user text-dark" style="opacity: 0.5;" id="user-icon"></li>
		</center>
	</div>
	<div class="col-xl-12 p-2" style="background-color: rgba(0,0,0,0.2);">
		<center>
			@if($data->vote->count() > 0)
			<div class="h4 text-light"><i class="fa fa-check-circle" aria-hidden="true"></i> Kamu sudah melakukan voting</div>
			@else
			<a href="voting/{{$data->id}}/{{$data->slug}}" class="h5 text-light"><li class="fa fa-arrow-circle-right"></li> Lakukan Voting</a>
			@endif
		</center>
	</div>
</div>
@endforeach
@else
<center>
	<div class="alert alert-warning"><li class="fa fa-exclamation-triangle"></li> Upss tidak ada voting untuk dilakukan silahkan hubungi admin</div>
</center>
@endif

<div style="margin-bottom: 100px;"></div>	
@endsection