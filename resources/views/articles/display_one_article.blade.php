@extends('layout/master')

@section('title')
	{{$article->title}}
@endsection

@section('main_content')
	{{$article->content}}

	@foreach ($article->comments as $comment)
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10">
			{{$comment->content}}
		</div>
	</div>
	@endforeach

	<form method="POST" action='{{url("/create_comment/$article->id")}}'>
		{{csrf_field()}}
		<input type="text" name="content"></input>
		<input type="submit" name="submit" value="Submit" class="btn btn-success"></input>
	</form>
@endsection