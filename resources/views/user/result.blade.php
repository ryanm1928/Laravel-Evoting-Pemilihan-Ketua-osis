@extends('template.layout')
@section('title','Result')
@section('content')
<h1>Page Result</h1>

<table border="2px solid black">

	<tr>
		<th>No</th>
		<th>Sampul</th>
		<th>Pilihan</th>
		<th>Jumlah  Pemilih</th>
		<th>Hasil</th>
	</tr>

	@foreach($data->choice as $item)
	<tr>
		<td>{{$item->id}}</td>
		<td><img src="{{asset($item->sampul)}}" alt="" width="50px"></td>
		<td>{{$item->name}}</td>
		<td>{{$item->vote->count()}}</td>
		<td>{{round($item->vote->count() / $jml * 100,2)}}%</td>
	</tr>
	@endforeach

</table>
@endsection