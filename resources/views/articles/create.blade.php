@extends('../layout/master')

@section('title')
	
@endsection

@section('main_content')
	<form method="POST" action="{{url('/create')}}">
	{{ csrf_field() }}
		<input type="text" name="title" placeholder="text"></input>
		<input type="text" name="content" placeholder="content"></input>
		<input type="submit" name="submit" value="Submit" class="btn btn-success"></input>
	</form>
@endsection