@extends('templateuser.layout')
@section('title','Polling')


@section('content')
<div class="alert alert-primary">
	<li>Click nama calon untuk melihat visi dan misi calon</li> 
	<li>Click gambar calon untuk memilih</li>
</div>
<div class="table-responsive">
	<table class="table table-striped shadow">
		<thead class="thead-dark">
			<tr>
				<th scope="col"><center>SILAHKAN PILIH</center></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><div class="row">
					@foreach($poll->choice as $data)
					<div class="col-sm-4">
						<center>
							<form action="" method="post">
								@csrf
								<input type="hidden" value="{{$data->id}}" name="userchoice">
								<button type="submit" class="bg-transparent" style="border:none;outline: none"><img src="{{asset($data->sampul)}}" alt="" class="w-75"></button>
								<div class="h4">{{$data->name}}</div>
							</form>
						</center>
					</div>
					@endforeach
					<?php
					$max = 9;
					$jlm = $max - $hitung;
					?>
					@for($i=0 ; $i < $jlm ; $i++)
					<div class="col-sm-4 mt-3" id="img-none">
						<center>
							<button type="submit" class="bg-transparent" style="border:none;outline: none;"><img src="{{asset('gambar/deafult.png')}}" alt="" class="w-75"></button>
							<i class="fa fa-2x fa-ban mt-3" aria-hidden="true"></i>
						</center>
					</div>
					@endfor
				</div></td>
			</tr>
		</tbody>
	</table>
	<div style="margin-bottom: 100px;"></div>
</div>

@endsection
