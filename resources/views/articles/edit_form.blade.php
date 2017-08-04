@extends('../layout/master')

@section('title')
	
@endsection

@section('main_content')
	<form method="POST" action='{{url("/edit/$article->id")}}'>
	{{ csrf_field() }}
		<input type="text" name="title" value="{{$article->title}}"></input>
		<input type="text" name="content" value="{{$article->content}}"></input>
		<input type="submit" name="submit" value="Submit" class="btn btn-success"></input>
	</form>
@endsection