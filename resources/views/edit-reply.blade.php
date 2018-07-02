@extends('layout/master')

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<div class="post_container">
			<div class="post_header">
				<div class="post_header_left">
		            <img src="/{{$reply->user->avatar}}">
		        </div>
		        <div class="post_header-content">
		        	<a href='{{url("".$reply->user->id."")}}'>{{$reply->user->name}}</a>	
		        </div>
		        <div class="post_content">
		        	<form method="POST" action='{{url("edit/reply/".$reply->id."")}}'>
		        		{{csrf_field()}}
		        		<textarea name="reply" class="form-control post-input" rows="1" placeholder="Write a reply...">{{$reply->reply}}</textarea>
		        		<input type="submit" name="edit-reply" value="Save changes" class="btn">
		        	</form>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection