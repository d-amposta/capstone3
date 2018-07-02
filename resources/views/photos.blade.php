@extends('layout/master')

@section('content')

@include('layout.profile_header')

<div class="row">
	<div class="col-xs-12 col-md-4 col-lg-3 side_about">
		@include('layout.sidebar_about')
	</div>
	<div class="col-xs-12 col-md-8 col-lg-9">
		<div class="photos_container">
			<div class="photos_header">
				@if($user->id == Auth::user()->id)
				<p>Your Photos</p>
				@else
				<p>{{$user->name}}'s photos</p>
				@endif
			</div>
			<div class="photos_content">
				@if(count($user->getPhotos()) > 0)
					@foreach($user->getPhotos() as $photo)
						<div class="img_container">
							<a href='{{url("post/".$photo->id."")}}'><img src="/{{$photo->picture}}"></a>	
						</div>
					@endforeach
				@else
					@if($user->id == Auth::user()->id)
						<p>You haven't posted any photos yet</p>
					@else
						<p>{{$user->name}} hasn't posted any photos yet</p>
					@endif
				@endif	
			</div>
		</div>
	</div>
</div>

@endsection