@extends('templateuser.layout')
@section('title','User Page')

@section('content')

@if($deadline >= 1)
@if(session('status'))
<div class="alert alert-success"><li class="fa fa-check-circle"></li> {{session('status')}}</div>
@else
<marquee scrolldelay="100" class="alert alert-warning"><li class="fa fa-exclamation-triangle"></li> Voting akan hilang jika batas waktu telah berahir / admin mengahapus data voting</marquee>
@endif

@foreach($poll as $data)
<div class="row bg-success user-content shadow mb-3">
	<div class="col-sm-7 p-5">
		<div class="h2 text-light" style="font-style: italic;">{{$data->title}}</div>
		<div class="text h5 mb-3 text-light"><li>{{$data->description}}</li></div>
		<div class="text-light"><li class="fa fa-calendar-times"></li> Batas waktu sampai:</div>
		<div class="text-light h6">{{$data->deadline}}</div>
	</div>
	<div class="col-sm-5 p-5" id="icon">
		<center>
			<li class="fa fa-user text-dark display-3" style="opacity: 0.5;"></li>
			<li class="fa fa-user text-dark display-3" style="opacity: 0.5;"></li>
			<li class="fa fa-user text-dark display-3" style="opacity: 0.5;"></li>
		</center>
	</div>
	<div class="col-sm-12 p-2" style="background-color: rgba(0,0,0,0.2);">
		<center>
			@if($data->vote->count() > 0)
			<div class="h4 text-light"><i class="fa fa-check-circle" aria-hidden="true"></i> Kamu sudah melakukan voting</div>
			@else
			<a href="polling/{{$data->id}}" class="h5 text-light"><li class="fa fa-arrow-circle-right"></li> Lakukan Voting</a>
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