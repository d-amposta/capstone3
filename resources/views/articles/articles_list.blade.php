@extends('../layout/master')

@section('title')
	Articles List
@endsection

@section('main_content')
<ul>
	<a href='{{url("/create")}}'><button class="btn btn-success">Create</button></a>
	@foreach($articles as $article)
		<a href='{{url("/home/$article->id")}}'><li>{{$article->title}}</li></a>
		<a href='{{url("/edit/$article->id")}}'><button class="btn btn-success">Edit</button></a>
		<a href='{{url("/home/delete/$article->id")}}'><button class="btn btn-danger">Delete</button></a>
	@endforeach
	{{-- <li>{{$article1}}</li>
	<li>{{$article2}}</li> --}}
</ul>
@endsection

