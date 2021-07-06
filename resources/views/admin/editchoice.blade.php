@extends('template.layout')
@section('title','Update Choice')
@section('content')
<h1>Edit Choice</h1>

<form action="/updatechoice/{{$id->id}}" method="post">
	@csrf
	@method('put')
	<input type="text" name="choice" value="{{$id->name}}">
	<button type="submit">Edit Choice</button>
</form>
@endsection