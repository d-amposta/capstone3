<div class="profile_content">
	<div class="row">
		<div class="col-xs-12 col-md-3 side_about">
			@include("layout.sidebar_about")
		</div><!-- col -->
		<div class="col-xs-12 col-md-6 posts_container">
			@if($user->id == Auth::user()->id)
			@include('layout.post_form')
			@endif
			@if(count($user->getPosts()) == 0)
				<div class="post_container">
					@if($user->id == Auth::user()->id)
						<p>You haven't posted anything yet</p>
					@else
						<p>{{$user->name}} hasn't posted anything yet</p>
					@endif
				</div>
			@else
				@foreach($user->getPosts() as $post)
					@include('layout.post_template')
				@endforeach
			@endif
		</div>
		<div class="col-xs-12 col-md-3 ifWideScreen">
			<div class="quick_view_container movable_div">
				<div class="quick_header">
					<a href=""><p>Photos</p></a>
				</div>
				<div class="quick_content quick_content_photos">
					@foreach($user->getLatestPhotos() as $photo)
						<div class="thumb_container">
							<a href="{{url('post/'.$photo->id.'')}}"><img src="/{{$photo->picture}}"></a>
						</div>		
					@endforeach				
				</div>
				<div class="quick_footer">
					<a href='{{url("".$user->id."/photos")}}' class="content_link">View all</a>
				</div>
			</div>
		</div>
	</div><!-- row -->
</div>
