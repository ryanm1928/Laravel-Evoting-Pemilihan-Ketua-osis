@extends('template.layout')
@section('title','Create Polling')
@section('content')
<h1>Halaman Mebuat polling</h1>


<form action="" method="get">
	<label for="">Masukan jumlah pilihan</label>
	<input type="number" value="{{$_GET['jumlah'] ?? '' }}" name="jumlah">
	<button type="submit">Buat polling</button> <br> <br>
</form>
@if(isset($_GET['jumlah']))

<form action="{{route('poll.store')}}" method="post">
	@csrf
	<input type="text" placeholder="Masukan Judul Polling" name="title">
	<textarea name="description" id="" cols="30" rows="10" placeholder="description"></textarea>
	<input type="date" name="deadline">
	
	@for($i = 0; $i < $_GET['jumlah'];$i++ )
	<input type="text" placeholder="Masukan pilihan" name="choice[]">
	<input type="file" name="sampul[]">
	@endfor

	<button type="submit">Buat polling</button>
</form>
@endif
@endsection