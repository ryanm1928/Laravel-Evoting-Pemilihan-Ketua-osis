@extends('template.layout')
@section('title','Update Polling')
@section('content')
<h1>Halaman Update polling</h1>

<form action="{{route('poll.update',['poll' => $id->id])}}" method="post">
	@csrf
	@method('put')
	<input type="text" name="title" value="{{$id->title}}">
	<textarea name="description" cols="30" rows="10">{{$id->description}}</textarea>
	<input type="date" name="deadline" value="{{date('Y-m-d').strtotime('$id->deadline')}}">
	<button type="submit">Edit data</button>
</form>
<table border="2px solid black">
	<thead>
		<tr>
			<th>Choice</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($id->choice as $choice)
		<tr>
			<td>{{$choice->name}}</td>
			<td><a href="/editchoice/{{$choice->id}}">Edit</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection