@extends('template.layout')
@section('title','Polling')


@section('content')
<h1>Halama Action Polling</h1>
<form action="" method="post">
	@csrf

	<?php foreach ($poll->choice as $data): ?>
		<img src="{{asset($data->sampul)}}" alt="" style="width: 200px;">
		
	<?php endforeach ?>
	<select name="userchoice" id="">
		<?php foreach ($poll->choice as $item): ?>
			<option value="{{$item->id}}">{{$item->name}}</option>
		<?php endforeach ?>
	</select>
	<button type="submit">Pilih</button>
</form>

@endsection
